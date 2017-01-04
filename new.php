<?php include 'header.php'; ?>


<div id="wrap">
<div id="results">
<h2>Add a new record to the database</h2>
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
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($title, $summary, $genre, $length, $backgroundimgurl, $posterimg, $releaseYear, $youtubeID, $rating, $storyline, $error)
 {
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 

<form action="" method="post">
<input class="input2" placeholder="Title" type="text" name="title" value="<?php echo $title; ?>" />
<input class="input2"  placeholder="Rating" type="text" name="rating" value="<?php echo $rating; ?>" />
<input class="input2"  placeholder="Genre" type="text" name="genre" value="<?php echo $genre; ?>" />
<input style="margin: 0;" class="input2"  placeholder="Length" type="text" name="length" value="<?php echo $length; ?>" /><br/>
<input class="input2"  placeholder="Backgroundimage url" type="text" name="backgroundimgurl" value="<?php echo $backgroundimgurl; ?>" />
<input class="input2"  placeholder="Posterimage url" type="text" name="posterimg" value="<?php echo $posterimg; ?>" />
<input class="input2"  placeholder="Release year" type="text" name="releaseYear" value="<?php echo $releaseYear; ?>" />
<input style="margin: 0;" class="input2"  placeholder="Youtube ID" type="text" name="youtubeID" value="<?php echo $youtubeID; ?>" /><br/>
<textarea class="text2" placeholder="Summary" type="text" name="summary"/><?php echo $summary; ?></textarea><textarea style="margin: 0;" class="text2" placeholder="Storyline" type="text" name="storyline"/></textarea><br/>
<input type="submit" name="submit" value="Submit">
</form> 
 
 <?php 
 }
 
 
 

 // connect to the database
 include('config.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 $summary = mysql_real_escape_string(htmlspecialchars($_POST['summary']));
 $genre = mysql_real_escape_string(htmlspecialchars($_POST['genre']));
 $length = mysql_real_escape_string(htmlspecialchars($_POST['length']));
 $backgroundimgurl = mysql_real_escape_string(htmlspecialchars($_POST['backgroundimgurl']));
 $posterimg = mysql_real_escape_string(htmlspecialchars($_POST['posterimg']));
 $releaseYear = mysql_real_escape_string(htmlspecialchars($_POST['releaseYear']));
 $youtubeID = mysql_real_escape_string(htmlspecialchars($_POST['youtubeID']));
 $storyline = mysql_real_escape_string(htmlspecialchars($_POST['storyline']));
 
 
 // save the data to the database
 mysql_query("INSERT data SET title='$title', genre='$genre', rating='$rating', length='$length', backgroundimgurl='$backgroundimgurl', posterimg='$posterimg', releaseYear='$releaseYear', youtubeID='$youtubeID', summary='$summary', storyline='$storyline'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: controlpanel.php"); 
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?> 
</div>
</div>
</div>

<?php include 'footer.php'; ?>