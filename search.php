<?php include 'header.php'; ?>

<div id="wrap">
<div id='results'>
<h2>Search results</h2>
<?php
if ($_REQUEST["string"]<>'') {
	$search_string = " AND (title LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR summary LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["genre"]<>'') {
	$search_genre = " AND genre='".mysql_real_escape_string($_REQUEST["genre"])."'";	
}

if ($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'') {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]."  >= '".$search_string.$search_genre;
} else {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE id>0".$search_string.$search_genre;
}

$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>




  <!-- MOVIE -->
	<div class="entry-wrap">
	<div style="background-image:url(<?php echo $row["posterimg"]; ?>);" class="number">
	<a href="page.php?id=<?php echo $row["id"]; ?>"><div class="numbertop-index">
	</div></a>
	</div>
	<div class="title">
	<h2><a href="page.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></h2>
	<div class="info">
	<span style="overflow: hidden; text-overflow: ellipsis; word-wrap: break-word;"><?php echo $row["summary"]; ?></span>
	</div>
	</div>
	<div class="rating">
	<h2><?php echo $row["rating"]; ?></h2>
	</div>
	</div>
  <!-- END -->
  
  
  
  
  
	<?php
		}
	} else {
	?>
<p>No results found.</p>
<?php	
}
?>

</div>
</div>

<?php include 'footer.php'; ?>