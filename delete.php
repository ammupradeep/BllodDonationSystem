<?php
include_once 'db_conn.php';

if(isset($_POST['delete'])){
    $id=$_POST['id'];

    $sql="DELETE FROM register_tb WHERE id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo '<script>alert("Data Deleted"); </script>';
        header("Location: view.php");
        exit();
    }else{
        echo '<script>alert("Error in Deletion"); </script>';
    }
}