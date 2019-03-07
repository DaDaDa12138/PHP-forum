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
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
	
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        

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
     <div class="container" style="margin:10% auto;width:800px;">
           
           <h2> Topics Posted</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">List of Topics Posted</h3>

                </div> 
                 <div class="panel-body">
               <table class="table table-stripped">
                                <th>Topic</th>
                                <th>Category</th>
                                <th>Action</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sqli = "SELECT * FROM tblpost as a join category as b on a.cat_id=b.cat_id";
                            $result = mysql_query($sqli);

                            while($row=mysql_fetch_array($result))
                            {
                                $id = $row['post_Id'];
                                echo "<tr>";
                                echo "<td>".$row['title']."</td>";
                                echo "<td>".$row['category']."</td>";
                                 echo "<td>".
                                    "<a href='../functions/delete-topic.php?post_Id=$id' class='btn btn-danger'>Delete</a>"
                                    ."</td>";
                                echo "</tr>";
                            }
                           

                            ?>
                            </table>
                     </div>
                </div>
    </div>
	</body>
</htmls