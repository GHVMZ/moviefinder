<?php include 'header.php'; ?>

<?php 
if(isset($_POST) && !empty($_POST))
{
session_start();
include("config.php"); //including config.php in our file
$username = mysql_real_escape_string(stripslashes($_POST['username'])); //Storing username in $username variable.
$password = mysql_real_escape_string(stripslashes(md5($_POST['password']))); //Storing password in $password variable.


$match = "select id from $table where username = '".$username."' and password = '".$password."';"; 

$qry = mysql_query($match);

$num_rows = mysql_num_rows($qry); 

if ($num_rows <= 0) { 

echo "<div id='wrap'><div id='results'>";
echo "<h2>Login error</h2>";
echo "<div class='entry-wrap-big'>";
echo "Sorry, there is no username $username with the specified password.";

echo "<br /><br /><a href='login.php'>Try again</a>";
echo "</div></div></div>";


} else {

$_SESSION['user']= $_POST["username"];
header("location:controlpanel.php");
// It is the page where you want to redirect user after login.
}
}else{
?>


<div id="wrap">
<div id="results">
<h2>Login</h2>
<div class="entry-wrap-big">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-signin" id = "login_form" >
<input type="text" name="username" size="20" placeholder="Username">
<input type="password" name="password" size="20" placeholder="Password">
<input type="submit" value="Log In" class="btn btn-large btn-primary">   
</form>
</div>
</div>
</div>

<?php include 'footer.php'; ?>
<?php
}
?>