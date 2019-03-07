<?php
		include "db.php";
        $comment = mysql_real_escape_string($_POST['comment']);
        $userid = $_POST['userid'];
        $postid = $_POST['postid'];
        date_default_timezone_set("America/Vancouver");
        $datetime=date("Y-m-d h:i:sa");
        $comment = mysql_query("Insert into tblcomment (comment,post_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
        $result = mysql_query("SELECT * from tblcomment as a join tbluser as b on a.user_Id=b.user_Id where post_Id='$postid' and a.user_Id='$userid' 
        					and a.datetime='$datetime'");

	 while($row=mysql_fetch_assoc($result)){
                    echo "<label>Comment by: </label> ".$row['fname']." <br>";        
                     echo "<p class='well'>".$row['comment']."</p>";
              }



              ?>