<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">PHP Project</a>
            </div>
			
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
					<li><a href="../functions/delete-topic.php"> Delete a topic</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="user.php">Current Users</a></li>
                </ul>
     				
                        <ul class="nav navbar-nav navbar-right">
                         <li><a href="#">Hi, <?php echo $username;?></a></li>
                        <li ><a href="logout.php"> Logout</a></li>
                
                </ul>		    
            </div>
        </div>
    </nav>
    <div class="container" style="margin:5% auto;">
    	<hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Programming</h3>
                </div> 
                 <div class="panel-body">
         
              
                
            <?php

                include "../functions/db.php";
                     $id = $_GET['post_id'];
                $result = mysql_query("SELECT * from tblpost as a join category as b on a.cat_id=b.cat_id where a.post_Id='$id' ");
                if($result==true){
                  while($row=mysql_fetch_assoc($result)){
                    extract($row);
                      $result1 = mysql_query("SELECT * from tbluser where user_Id='$user_Id' ");
                      while($row=mysql_fetch_assoc($result1)){
                        extract($row);
                        echo "<label>Title: </label> ".$title."<br>";
						echo '<label>Created By: </label>'.$fname;
                       echo "<p class='well'>".$content."</p>"; 
                      }  
                    
                }
                }
            
              ?>

              <br><label><h2>Comments</h2></label><br>
              <div id="id_coms">
              <?php 
              $postid= $_GET['post_id'];
              $sqli = mysql_query("SELECT * from tblcomment as a join tbluser as b on a.user_Id=b.user_Id where post_Id='$postid' order by datetime");
              $result2 = mysql_num_rows($sqli);
              if($result2>0){
              while($row=mysql_fetch_assoc($sqli)){
                    echo "<label>Comment by: </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo "<p class='well'>".$row['comment']."</p>";
              }

            }

              ?>
            </div>
              </div>
          </div>
          <hr>
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Comment</h3>
          <form method="POST">
            <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" value="<?php echo $_GET['post_id']; ?>">
            <input type="hidden" id="userid" value="<?php echo $_SESSION['user_Id']; ?>">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
          </form>
        </div>
    </div>


</body>
<script>

$("#save").click(function(){
var p = $("#postid").val();
var u = $("#userid").val();
var c = $("#commenttxt").val();
var s= 'postid=' + p + '&userid=' + u + '&comment=' + c;
if(!c){
  alert("You should leave some comments here");
}
else{
  $.ajax({
    type:"POST",
    url: "../functions/addcomment.php",
    data: s,
    success: function(value){
      document.getElementById("commenttxt").value=' ';
      $("#id_coms").append(value);
    }
  });
}
return false;
})

</script>
</html>