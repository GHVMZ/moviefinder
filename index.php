<?php include 'header.php'; ?>




<div id="wrap">
<div id="results">
<h2>The five latest movies</h2>

<?php
$query="SELECT * FROM data ORDER BY date LIMIT 5";
$result=mysql_query($query) or die('Error, insert query failed');
$row=0;
$numrows=mysql_num_rows($result);

while($row < $numrows)
{
$title=mysql_result($result,$row,"title");
$rating=mysql_result($result,$row,"rating");
$summary=mysql_result($result,$row,"summary");
$id=mysql_result($result,$row,"id");
$posterimg=mysql_result($result,$row,"posterimg");
?>
<div class="entry-wrap fade1">
<div style="background-image:url(<?php echo $posterimg; ?>);" class="number">
<div class="numbertop-index">
</div>
</div>
<div class="title">
<h2><a href="page.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
<div class="info">
<span style="overflow: hidden; text-overflow: ellipsis; word-wrap: break-word;"><?php echo $summary; ?></span>
</div>
</div>
<div class="rating">
<h2><?php echo $rating; ?></h2>
</div>
</div>
<?php

$row++;
}
?>

</div>
</div>

<?php include 'footer.php'; ?>