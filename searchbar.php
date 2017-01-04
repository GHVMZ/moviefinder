<form id="form1" name="form1" method="post" action="search.php">
<input placeholder="Search for movie" type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
<select name="genre">
<option value="">genre</option>
<?php
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." GROUP BY genre ORDER BY genre";
	$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	while ($row = mysql_fetch_assoc($sql_result)) {
		echo "<option value='".$row["genre"]."'".($row["genre"]==$_REQUEST["genre"] ? " selected" : "").">".$row["genre"]."</option>";
	}
?>
</select>
<input type="submit" name="button" id="button" value="Filter" />
<a class="reset" href="index.php">Reset</a>
<div class="count" style="float: right">
Movies in database: <span style="color: #777;"><?php
$result = mysql_query("SELECT count(*) from data;");
echo mysql_result($result, 0);
?>
</span>
</div>
</form>