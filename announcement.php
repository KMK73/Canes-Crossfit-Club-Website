<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:/peak_login.php");
}
include($_SERVER['DOCUMENT_ROOT'].'/header_coach.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <body>

<!-- body content here -->


<!--        Database call for username and password PHP ---------------------------------------------->
			
<?php if($_POST): ?>

<?php 

    include 'connect.php';

        $announcement_name = mysqli_escape_string($sql_link, $_POST['announcement_name']);
        $link = mysqli_escape_string($sql_link, $_POST['link']);
        $description = mysqli_escape_string($sql_link, $_POST['description']);
        
        $query = sprintf("INSERT INTO announcements (announcement_name, link, description) VALUES ('%s', '%s', '%s')", $announcement_name, $link, $description);

        $result = mysqli_query($sql_link, $query);
//        echo $query;
		?>
	<?php else:?>

	<h3>No Post Provided</h3>

	<?php endif;?>

      
<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
      <div class="small-12 small-centered columns">

    <h1>Create Club Announcement</h1>

          <form action="announcement.php" method="POST">
    
        <h2>Announcement Name</h2>
        <input type="text" name="announcement_name"/>

        <h2>Video or Image Link</h2>
        <input type="text" placeholder="Place video link here" name="link"/>

        <h2>Announcement Description</h2>
        <input type="text" placeholder="Announcement Description" name="description"/>

        </br><input class="button" type="submit" value="Create"/>
            </form> 
    </div>
</div>


    </body>
</html>
