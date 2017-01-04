<?php include 'header.php'; ?>


<div id="wrap">

<div id="results">
<h2>Edit</h2>
<?php
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
?>
<?php 
}else{
 header("location:index.php");
}
?>
<a href="controlpanel.php">Back to the control panel</a><br /><br />
<div class="entry-wrap-big">
<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $title, $rating, $genre, $length, $backgroundimgurl, $posterimg, $releaseYear, $youtubeID, $summary, $storyline, $error)
 {
 ?>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<input class="input2" placeholder="Title" type="text" name="title" value="<?php echo $title; ?>" />
<input class="input2"  placeholder="Rating" type="text" name="rating" value="<?php echo $rating; ?>" />
<input class="input2"  placeholder="Genre" type="text" name="genre" value="<?php echo $genre; ?>" />
<input style="margin: 0;" class="input2"  placeholder="Length" type="text" name="length" value="<?php echo $length; ?>" /><br/>
<input class="input2"  placeholder="Backgroundimage url" type="text" name="backgroundimgurl" value="<?php echo $backgroundimgurl; ?>" />
<input class="input2"  placeholder="Posterimage url" type="text" name="posterimg" value="<?php echo $posterimg; ?>" />
<input class="input2"  placeholder="Release year" type="text" name="releaseYear" value="<?php echo $releaseYear; ?>" />
<input style="margin: 0;" class="input2"  placeholder="Youtube ID" type="text" name="youtubeID" value="<?php echo $youtubeID; ?>" /><br/>
<textarea class="text2" placeholder="Summary" type="text" name="summary"/><?php echo $summary; ?></textarea><textarea style="margin: 0;" class="text2" placeholder="Storyline" type="text" name="storyline"/><?php echo $storyline; ?></textarea><br/>
<input type="submit" name="submit" value="Submit">
</form> 
 
 <?php
 }

 // connect to the database
 include('config.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 $rating = mysql_real_escape_string(htmlspecialchars($_POST['rating']));
 $genre = mysql_real_escape_string(htmlspecialchars($_POST['genre']));
 $length = mysql_real_escape_string(htmlspecialchars($_POST['length']));
 $backgroundimgurl = mysql_real_escape_string(htmlspecialchars($_POST['backgroundimgurl']));
 $posterimg = mysql_real_escape_string(htmlspecialchars($_POST['posterimg']));
 $releaseYear = mysql_real_escape_string(htmlspecialchars($_POST['releaseYear']));
 $youtubeID = mysql_real_escape_string(htmlspecialchars($_POST['youtubeID']));
 $summary = mysql_real_escape_string(htmlspecialchars($_POST['summary']));
 $storyline = mysql_real_escape_string(htmlspecialchars($_POST['storyline']));
 
 // check that firstname/lastname fields are both filled in
 // save the data to the database
mysql_query("UPDATE data SET title='$title', rating='$rating', genre='$genre', length='$length', backgroundimgurl='$backgroundimgurl', posterimg='$posterimg', releaseYear='$releaseYear', youtubeID='$youtubeID', summary='$summary', storyline='$storyline' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: controlpanel.php"); 
 }
 }
 else
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM data WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $title = $row['title'];
 $rating = $row['rating'];
 $genre = $row['genre'];
 $length = $row['length'];
 $backgroundimgurl = $row['backgroundimgurl'];
 $posterimg = $row['posterimg'];
 $releaseYear = $row['releaseYear'];
 $youtubeID = $row['youtubeID'];
 $summary = $row['summary'];
 $storyline = $row['storyline'];
 
 // show form
 renderForm($id, $title, $rating, $genre, $length, $backgroundimgurl, $posterimg, $releaseYear, $youtubeID, $summary, $storyline, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 
?>
</div>
</div>
</div>

<?php include 'footer.php'; ?>