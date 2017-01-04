<?php include 'header.php'; ?>

<div id="wrap">

<div id="results">
<h2>Control panel</h2>
<p><a href="new.php">Add a new record</a><a style="float: right;" href="" id="dropdown">How to add a movie?</a></p>
<div class="dropdownwrap">
<iframe width="960" height="540" src="//www.youtube.com/embed/3mSbFnpS9Z0?rel=0" frameborder="0" allowfullscreen></iframe>
</div>
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
        VIEW.PHP
        Displays all data from 'players' table
*/

        // connect to the database
        include('config.php');

        // get results from database
        $result = mysql_query("SELECT * FROM data") 
                or die(mysql_error());  
                
        // display data in table
        
        echo "<table id='admintable'>";
        echo "
		<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Summary</th>
		<th>Storyline</th>
		<th>Genre</th>
		<th>Rating</th>
		<th>Length</th>
		<th>Released</th>
		<th>YoutubeID</th>
		<th></th>
		<th></th>
		</tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['id'] . '</td>';
                echo '<td style="max-width: 200px;"><a href="page.php?id=' . $row['id'] . '">' . $row['title'] . '</a></td>';
                echo '<td>' . $row['summary'] . '</td>';
				echo '<td>' . $row['storyline'] . '</td>';
				echo '<td>' . $row['genre'] . '</td>';
				echo '<td>' . $row['rating'] . '</td>';
				echo '<td>' . $row['length'] . '</td>';
				echo '<td>' . $row['releaseYear'] . '</td>';
				echo '<td>' . $row['youtubeID'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo "</tr>"; 
        } 

        // close table>
        echo "</table>";
?>
</div>
</div>

<?php include 'footer.php'; ?>