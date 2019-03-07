<?php

include "../functions/db.php";
 					date_default_timezone_set("America/Vancouver");
                        $datetime=date("Y-m-d h:i:sa");
                        
extract($_POST);
$sql = "INSERT INTO tblpost(title,content, cat_id,datetime,user_Id) VALUES ('$title','$content','$category','$datetime','$userid')";
$res = mysql_query($sql);

if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Action Successfully")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=../pages/home.php" />';
                            }


?>