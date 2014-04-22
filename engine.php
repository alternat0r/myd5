<?php

define('STR_HIGHLIGHT_SIMPLE', 1);
define('STR_HIGHLIGHT_WHOLEWD', 2);
define('STR_HIGHLIGHT_CASESENS', 4);
define('STR_HIGHLIGHT_STRIPLINKS', 8);

// HELP contribute by add string that do not detected by system and will generate automatically.
// put FAQ
// +case should be sensitive during input
// +focus on input

function dosearch($search) {
	$mark1_failed = 0;
	$mark2_failed = 0;
	if (strlen($search) == 0 OR $search == '') {
		echo '<center><strong>No result found, please input something.</strong></center>';
	} else {
		strip_tags($search);
		$link = mysql_connect('localhost', 'root', '');
		if (! $link) die('Unable to connect to the database');
		mysql_select_db('myd5') or die('Could not open database.');

		// search for md5		
		$query = sprintf("SELECT * FROM search WHERE `description` LIKE '%s'", mysql_real_escape_string($search));
		$result = mysql_query($query);

		while ($row = mysql_fetch_array($result))
		{
			htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
			$md5 = $row['description'];
			echo '<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>';			
			echo htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8').' = '.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'<BR/>';		
			echo '</strong></font>';
		}
		if(!$md5) $mark1_failed = 1;

		// search for string
		$query = sprintf("SELECT * FROM search WHERE `title` LIKE '%s'", mysql_real_escape_string($search));
		$query = mysql_real_escape_string($query);
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result))
		{
			$answer = $row['title'];
			echo '<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>';
			echo ''.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').' = '.htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8').'<BR/>';
			echo '</strong></font>';
		}
		if(!$answer) $mark2_failed = 1;

		if ($mark1_failed == 1 AND $mark2_failed == 1) //if found nothing on db
		{
			$md5val = md5($search);
			if(strlen($search) < 32 OR strlen($search) > 32)
			{
				$query = mysql_query("INSERT IGNORE INTO search (description, title) VALUES ('$md5val', '$search')");
				echo '<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>';
				echo '<center><strong>'.htmlspecialchars($search, ENT_QUOTES, 'UTF-8').' = '.md5($search).'</strong></center>';
				echo '</strong></font>';
			}else{
				//its md5
				$space = strpos($search, " ");
				$alphanum = ctype_alnum($search);
				if (strlen($search) == 32 AND $space === false AND $alphanum === true) //to ensure it is md5 hashes
				{
					echo '<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>';
					echo 'Sorry no luck.';
					echo '</strong></font><br/>';
				}else{ // the word is 32 length and contain spaces then calculate it
					$query = mysql_query("INSERT IGNORE INTO search (description, title) VALUES ('$md5val', '$search')");
					echo '<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>';
					echo '<center><strong>'.htmlspecialchars($search, ENT_QUOTES, 'UTF-8').' = '.md5($search).'</strong></center>';
					echo '</strong></font>';
				}
			}
		}
		$search = '';
		$answer = '';
		$md5 = '';
		$md5val = '';
		$query = '';
		mysql_free_result($result);
		mysql_close($link);
	}
}



function str_highlight($text, $needle, $options = null, $highlight = null) {
    // Default highlighting
    if ($highlight === null) {
        $highlight = '<strong>\1</strong>';
    }
    if ($options & STR_HIGHLIGHT_SIMPLE) {
        $pattern = '#(%s)#';
        $sl_pattern = '#(%s)#';
    } else {
        $pattern = '#(?!<.*?)(%s)(?![^<>]*?>)#';
        $sl_pattern = '#<a\s(?:.*?)>(%s)</a>#';
    }
    if (!($options & STR_HIGHLIGHT_CASESENS)) {
        $pattern .= 'i';
        $sl_pattern .= 'i';
    }
    $needle = (array) $needle;
    foreach ($needle as $needle_s) {
        $needle_s = preg_quote($needle_s);
        if ($options & STR_HIGHLIGHT_WHOLEWD) {
            $needle_s = '\b' . $needle_s . '\b';
        }
        if ($options & STR_HIGHLIGHT_STRIPLINKS) {
            $sl_regex = sprintf($sl_pattern, $needle_s);
            $text = preg_replace($sl_regex, '\1', $text);
        }
        $regex = sprintf($pattern, $needle_s);
        $text = preg_replace($regex, $highlight, $text);
    }
 
    return $text;
}
?>
