<?php
 $id = $_GET['id'];
 include "functions.php";
 $sql = "DELETE FROM users_tbl WHERE id = $id";
 $result = dbQuery($sql);
           if($result){
               echo  "<meta http-equiv='refresh' content='0;URL=index.php'>";
           }else{
               echo "Error";
           }