<?php
  $con = mysql_connect("localhost", "root", "")

  if(!$con) {
	     die('Could not conncet: ' . mysql_error());
	    }
  
  mysql_select_db("SMZDM", $con);

  mysql_query("insert into Notepad
  values('Tifosi', 'dklfejewio32r', current_timestamp)");
?>
