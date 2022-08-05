<?php
include "db_conn.php";

if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['group']) && isset($_POST['phnum']) && isset($_POST['date'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['name']);
    $add = validate($_POST['address']);
    $blood = validate($_POST['group']);
    $num = validate($_POST['phnum']);
    $date = validate($_POST['date']);

    $user_data = 'uname='. $uname;


    if(empty($uname)){
        header("Location: register.php?error=Name is required&$user_data");
        exit();
    }else if(empty($add)){
        header("Location: register.php?error=Address is required&$user_data");
        exit();
    }else if(empty($blood)){
        header("Location: register.php?error=Blood Group is required&$user_data");
        exit();
    }else if(empty($num)){
        header("Location: register.php?error=Phone Number is required&$user_data");
        exit();
    }else if(empty($date)){
        header("Location: register.php?error=Date is required&$user_data");
        exit();
    }else if(!filter_var($num,FILTER_SANITIZE_NUMBER_INT)){
        header("Location: register.php?error=Phone Number is invalid&$user_data");
        exit();
    }else{
        $sql2 = "SELECT * FROM register_tb WHERE name='$uname'";
        $result2 = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result2) > 0){
            header("Location: index.php?error=The Name is already Registered try another&$user_data");
            exit();
        }else{
            $sql = "INSERT INTO register_tb(name,address,blood_grp,phnum,date) VALUES('$uname','$add','$blood','$num','$date')";
            $result = mysqli_query($conn, $sql);
    
            if($result){
                header("Location: register.php?success=Your Registration is successfull&$user_data");
                exit();
            }else{
                header("Location: register.php?error=unknown error occured&$user_data");
                exit();
            }
        }

        





       
    }

}else{
    header("Location: register.php");
    exit();
}


?>