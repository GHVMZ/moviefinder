<?php include 'header.php'; ?>

<?php
$id = intval($_GET['id']);
$results = mysql_query("SELECT * FROM data WHERE id=$id");    
while ($row = mysql_fetch_array($results))     
{       
    $title = $row['title'];
	$backgroundimgurl = $row['backgroundimgurl'];
	$posterimg = $row['posterimg'];
	$summary = $row['summary'];
	$length = $row['length'];
	$genre = $row['genre'];
	$releaseYear = $row['releaseYear'];
	$youtubeID = $row['youtubeID'];
	$storyline = $row['storyline'];
	$date = $row['date'];
	$rating = $row['rating'];
}
?>

<div style="background-image:url(<?php echo $backgroundimgurl; ?>);" id="slider">
<div id="slideroverlay">

</div>
</div>

<div id="wrap-page">
<div id="topwrap">
		<div id="postimg"style="background-image:url('<?php echo $posterimg; ?>');" class="fade1">
		<div id="postimgshine">
		
		</div>
		</div>
	<div id="topwrapinfo">
	<div class="fade1" id="toptitle">
	<h2><?php echo $title; ?></h2>
	</div>

	<div id="smallinfo">
	<ul>
	<li style="margin-left: 0;">Length <span class="orange"><?php echo $length; ?></span></li>- 
	<li>Genre <span class="orange"><?php echo $genre; ?></span></li>-
	<li>Released in <span class="orange"><?php echo $releaseYear; ?></span></li>-
	<li>Rating <span class="orange"><?php echo $rating; ?></span></li>
	</ul>
	</div>
	</div>
</div>

<div id="results">
<div id="resultsleft">
	
	<div class="summaryleft">
	<h3>Movies you may like</h3>
<?php
$query="SELECT * FROM data ORDER BY rand() DESC LIMIT 3";
$result=mysql_query($query) or die('Error, insert query failed');
$row=0;
$numrows=mysql_num_rows($result);

while($row<$numrows)
{
$title=mysql_result($result,$row,"title");
$rating=mysql_result($result,$row,"rating");
$id=mysql_result($result,$row,"id");
$posterimg=mysql_result($result,$row,"posterimg");
$genre=mysql_result($result,$row,"genre");
$length=mysql_result($result,$row,"length");
?>
<div class="random">
<a href="page.php?id=<?php echo $id; ?>"><img class="smallimg" width="10" height="50" src="<?php echo $posterimg; ?>"></a>
<a href="page.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
<ul>
<li><strong>Length</strong> <?php echo $length; ?></li>
<li><strong>Genre</strong> <?php echo $genre; ?></li>
<li><strong>Rating</strong> <?php echo $rating; ?></li>
</ul>
</div>
<?php

$row++;
}
?>
</div>

</div>

<div id="resultssidebar">
	<div class="summarytop">
	<h3>Summary</h3>
	<p><?php echo $summary; ?></p></div>
	
	<div class="trailer">
	<iframe width="600" height="338" src="//www.youtube.com/embed/<?php echo $youtubeID; ?>" frameborder="0" allowfullscreen></iframe>
	</div>
	
	<div class="summary">
	<h3>Storyline</h3>
	<p><?php echo $storyline; ?></p>
	</div>
	
	<div class="summary">
	<strong>Added</strong> <?php echo $date; ?>
	</div>

	
</div>
</div>
</div>

<?php include 'footer.php'; ?>