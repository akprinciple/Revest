<?php
include 'inc/session.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = mysqli_query($connect, "SELECT * FROM withdrawal WHERE id = '{$id}'");
    $row = mysqli_fetch_array($sql);
   
    $date = date('d/m/Y');
    
    
    if($row['status'] == 1){
        $insert = mysqli_query($connect, "UPDATE withdrawal SET status = 0 WHERE id= '{$id}'");
        if($insert){
        echo "fa-solid fa-times btn btn-danger | click to approve";
        }
       
    }elseif($row['status'] == 0){
        $insert = mysqli_query($connect, "UPDATE withdrawal SET status = 1, date = '{$date}' WHERE id= '{$id}'");
        if($insert){                       
            echo "fa-solid fa-check btn btn-primary | click to Unapprove";
            }
        
    }
    

    }




?>