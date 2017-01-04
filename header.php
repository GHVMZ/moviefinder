<?php
error_reporting(0);
include("config.php");

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) 
&& !empty($_POST['email'])){
// Now checking user name and password is entered or not.
$first_name= mysql_real_escape_string($_POST['firstname']);
$last_name= mysql_real_escape_string($_POST['lastname']);
$username = mysql_real_escape_string(stripslashes($_POST['username']));
$password = mysql_real_escape_string(stripslashes(md5($_POST['password'])));
$mail = mysql_real_escape_string($_POST['email']);
$check = "SELECT * from users where username = '".$user."'";
$qry = mysql_query($check);
$num_rows = mysql_num_rows($qry); 

if($num_rows > 0){
// Here we are checking if username is already exist or not.

echo "The username you have entered is already exist. Please try another username.";
echo '<a href="signup.php">Try Again</a>';
exit;
}

// Now inserting record in database.
$query = "INSERT INTO users (firstname,lastname,username,password,email,is_active) VALUES ('".$first_name."','".$last_name."','".$username."','".$password."','".$mail."','1');";
mysql_query($query);
echo "Thank You for Registration.";
echo '<a href="login.php">Click Here</a> to login you account.';
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Movie Finder</title>
<link href="style/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="style/fade.css" rel="stylesheet" type="text/css" media="all" />
<link href="style/table.css" rel="stylesheet" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>

<link href='http://fonts.googleapis.com/css?family=Dosis:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:600,700' rel='stylesheet' type='text/css'>
</head>

<body>
<header>
	<div id="topmenu">
	<div class="topmenu-spacing">
		<ul style="float: left;">
		<li><a href="top30.php">Top 30</a></li>
		<li><a href="information.php">Information</a></li>
		</ul>
		
		<ul style="float: right;">
		<?php
			session_start();
			if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			 echo "<li>Logged in as <span style='color: #666;'>". $_SESSION['user']. "</span></li>";
			?>
			<li><a href="controlpanel.php">Control panel</a></li>
			<li style="margin-right: 0;"><a href="logout.php">Log out</a></li>
			
			<?php 
			}else{
			 echo "<li style='margin-right: 0;'><a href='login.php'>Login</a></li>";
			}
			?>	
		</ul>
	</div>
	</div>

<div id="header">
<div id="headerspacing">
	<a href="index.php" class="logo"><h1 name="top">Movie Finder</h1></a>

	<div id="searchbar">
	<form id="form1" name="form1" method="post" action="search.php">
	<input class="sok" placeholder="Search for movie, actors and more..." type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
	<select class="genre" name="genre">
	<option value="">Genre</option>
	<?php
		$sql = "SELECT * FROM ".$SETTINGS["data_table"]." GROUP BY genre ORDER BY genre";
		$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
		while ($row = mysql_fetch_assoc($sql_result)) {
			echo "<option value='".$row["genre"]."'".($row["genre"]==$_REQUEST["genre"] ? " selected" : "").">".$row["genre"]."</option>";
		}
	?>
	</select>
	<input class="knapp" type="submit" name="button" id="button" value="Search" />
	</form>
	</div>
</div>
</div>
</header>