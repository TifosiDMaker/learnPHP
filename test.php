<?php
    include("conn.php");
    $i = 1;
    $result = mysql_query("select Username, textfiled, noteTime from Notepad order by noteTime desc", $con);
    if (!$result) {
      die("Could not get data: " . mysql_error());
    }
    else {
      echo $result;
    }
    while ($rows = mysql_fetch_array($result)) {
    	echo $rows['Username'] . $i . "\n";
	$i += 1;
    	}
?>
