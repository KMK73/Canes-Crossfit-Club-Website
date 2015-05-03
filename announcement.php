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

      
<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
      <div class="small-12 small-centered large-8 large-centered columns">
    <h1>Create Club Announcement</h1>

          <form action="announcement.php" method="POST">
    
        <h2>Announcement Title</h2>
        <input type="text" placeholder="Title"name="announcement_name"/>

        <h2>Video or Image Link</h2>
        <input type="text" placeholder="Place video link here (If from YouTube select the src text from the EMBED link)" name="link"/>

        <h2>Announcement Description</h2>
<textarea placeholder="Announcement Description" name="description"></textarea>

        <center><input class="button" type="submit" value="Submit Announcement"/></center>
            </form> 
    </div>
</div>
<!--        Database call for username and password PHP ---------------------------------------------->
			
<?php if($_POST): ?>

<?php 

    include 'connect.php';

        $announcement_name = mysqli_escape_string($sql_link, $_POST['announcement_name']);
        $link = mysqli_escape_string($sql_link, $_POST['link']);
        
        $description =$_POST['description'];
//convert line breaks in texts using this function
        $description = nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));
        
        $query = sprintf("INSERT INTO announcements (announcement_name, link, description) VALUES ('%s', '%s', '%s')", $announcement_name, $link, $description);

        $result = mysqli_query($sql_link, $query);
//        echo $query;
		?>
	<?php else:?>

    <div class="small-10 small-centered large-6 large-centered columns"><h3>No Post Provided</h3></div>

	<?php endif;?>

    </body>
</html>
