<!DOCTYPE html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8" />
    <!-- if you remove this meta tag, the NSA will spy on you through your Xbox Kinect camera -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peak 360 Crossfit</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <link rel="stylesheet" href="stylesheets/app.css" />
   <script src="bower_components/modernizr/modernizr.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>

    
    </head>

  <body>

    <!-- body content here -->

<!-- -------------------------------------NAVIGATION------------------------- -->
          
<?php include 'header_coach.php';?>

<!--        start of icon image flexbox row---------------------------------------->
<div class="row">
<h1>Wod Database</h1>

<!--new workout button-->
    <form action="/create_workout.php">
        <input class="button" type="submit" value="Add New Workout">
    </form> 


<!--       WORKOUT TABLE DATA flexbox row---------------------------------------->
<div class="small-12 small-centered columns">
<!--search bar and filter -->
    <div class="small-12 small-centered columns">
    <input type="search" id="database_search" placeholder="Search">
    <h3>Type</h3><select> 
            <option>Timed</option>
            <option>Not Timed</option>
            <option>Rounds</option>
            <option>Reps</option>
        </select>
    </div>
        
    <table class="leaderboard" id="table1" role="grid">
            <th>Name</th>
            <th>Type</th>
            <th>Date Added</th>
            <th>Last Used</th>
            <tr>
                <td>Crossfit Open 15.3</td>
                <td>Rounds</td>
                <td>February 25, 2015</td>
                <td>February 26, 2015</td>  
                    <td><form action="create_workout.php">
                        <input type="submit" value="Edit">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
            <tr>
                <td>Crossfit Open 15.3</td>
                <td>Rounds</td>
                <td>February 25, 2015</td>
                <td>February 26, 2015</td>  
                    <td><form action="create_workout.php">
                        <input type="submit" value="Edit">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
            <tr>
                <td>Crossfit Open 15.3</td>
                <td>Rounds</td>
                <td>February 25, 2015</td>
                <td>February 26, 2015</td>
                    <td><form action="create_workout.php">
                        <input type="submit" value="Edit">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
                <td>Crossfit Open 15.3</td>
                <td>Rounds</td>
                <td>February 25, 2015</td>
                <td>February 26, 2015</td> 
                    <td><form action="create_workout.php">
                        <input type="submit" value="Edit">
                        <input type="submit" value="Delete">
                    </form></td>
            </tr>
        </table>


<script language="javascript" type="text/javascript">  
    var table1Filters = {  
        col_0: "select",  
        col_4: "none",  
        btn: true  
    }  
    var tf03 = setFilterGrid("table1",2,table1Filters);  
</script> 


    </div>
</div>      
        
        
    </body>
</html>
