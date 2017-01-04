<?php

$SETTINGS["hostname"]='localhost';
$SETTINGS["mysql_user"]='root';
$SETTINGS["mysql_pass"]='';
$SETTINGS["mysql_database"]='moviefinder';
$SETTINGS["data_table"]='data'; // this is the default database name that we used
$table = "users";    // the table that this script will set up and use.
/*
$SETTINGS["hostname"]='java-160804.mysql.binero.se';
$SETTINGS["mysql_user"]='160804_ct32230';
$SETTINGS["mysql_pass"]='Johnjohn92';
$SETTINGS["mysql_database"]='160804-java';
$SETTINGS["data_table"]='data'; // this is the default database name that we used
*/
if (!isset($install) or $install != '1') {
	$connection = mysql_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
	$db = mysql_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
};


?>