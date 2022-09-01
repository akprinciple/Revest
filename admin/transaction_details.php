<?php
include 'inc/session.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = mysqli_query($connect, "SELECT * FROM investments WHERE id = '{$id}'");
    $row = mysqli_fetch_array($sql);
   
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    
    if($row['status'] == 1){
        $insert = mysqli_query($connect, "UPDATE investments SET status = 0 WHERE id= '{$id}'");
        if($insert){
        echo "fa-solid fa-times btn btn-danger | click to approve";
        }
       
    }elseif($row['status'] == 0){
        $insert = mysqli_query($connect, "UPDATE investments SET status = 1, day = '{$day}', month = '{$month}', year = '{$year}' WHERE id= '{$id}'");
        if($insert){                       
            echo "fa-solid fa-check btn btn-primary | click to Unapprove";
            }
        
    }
    

    }




?>