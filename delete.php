<?php include 'header.php'; ?>


<div id="wrap">

<div id="results">
<h2>Delete</h2>
<?php
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
?>
<?php 
}else{
 header("location:index.php");
}
?>
<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('config.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM data WHERE id=$id")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: controlpanel.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: controlpanel.php");
 }
 
?>

</div>
</div>

<?php include 'footer.php'; ?>