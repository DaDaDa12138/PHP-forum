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

  if (!isset($_SERVER['HTTPS'])) {
    $url = 'https://' . $_SERVER['HTTP_HOST'] .
           $_SERVER['REQUEST_URI'];  
    header("Location: " . $url);  
    exit;                         
  }    
  
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
	
    <div class="container" style="margin:7% auto;">
    	<h4>Topic List</h4>
    	<hr>
        <?php  include "../functions/db.php";

        $result = mysql_query("SELECT * from category");
        while($row=mysql_fetch_assoc($result)){
            extract($row);
           echo '<div class="panel panel-success">
                    <div class="panel-heading">
                    <h3 class="panel-title">'.$category.'</h3>
                    </div> 
                    <div class="panel-body">
					<a href="#topic" class="pull-right btn btn-success">Add New</a><br><br>
                    <table class="table table-stripped">
                    <tr>
                    <th>Topic title</th>
                    <th>Category</th>
                    <th>Action</th>
                    </tr>';
                    $result1 = mysql_query("SELECT * from tblpost where cat_id='$cat_id' ");
					$sqli = "SELECT * FROM tblpost as tp join category as c on tp.cat_id=c.cat_id";

                    while($row1=mysql_fetch_assoc($result1)){
                        extract($row1);
                        echo '<tr>';
                        echo '<td>'.$title.'</td>';
                        echo '<td>'.$category.'</td>';
                        echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-success">Detail</button></td>';
                        echo '</tr>';
                    }
                echo '</table>
                    </div>
                </div>';
        }
        ?>
		<div class="my-topic" id="topic">
            <div> 
                <form method="POST" action="../functions/topic-function.php">
                        
                         <label>Select Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php $res = mysql_query("SELECT * from category");

                                if($res==true){
                                    while($row=mysql_fetch_assoc($res)){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <label>What is your topic title</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content for the topic</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Submit">
                   </form><br>
                <hr>
                  <a href="" class="pull-right">Leave</a>
              </div>
        </div>



</body>
</html>