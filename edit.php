<?php
include_once 'db_conn.php';


$id=$_POST['id'];

$sql="select * from register_tb where id='$id'";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Edit Donor</title>
</head>
<body>
    <div class="form1">
        <form action="" method="post">
            <h2>Edit Donor Details</h2>
            <?php
        if($result){
            while($row=mysqli_fetch_array($result)){
                ?>

            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="<?php echo $row["name"]; ?>" ><br>
            
            <label>Address</label>
            <input type="text" name="address" placeholder="Address" value="<?php echo $row["address"]; ?>"><br>
    
            <label>Blood Group</label>
            <select class="dropdown" name="group" value="<?php echo $row["blood_grp"]; ?>">
                    <option ><?php echo $row["blood_grp"]; ?></option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
            </select>
            
            <label>Phone Number</label>
            <input type="number" name="phnum" placeholder="Phone Number" value="<?php echo $row["phnum"]; ?>"><br>
    
            <label>Date</label>
            <input type="date" name="date" value="<?php echo $row["date"]; ?>"><br>
    
            <button type="submit" name="update">UPDATE</button>
            </form>
            <?php
            if(isset($_POST['update'])){
                $name = $_POST['name'];
                $address = $_POST['address'];
                $bloodgroup = $_POST['blood_grp'];
                $phnum = $_POST['phnum'];
                $date = $_POST['date'];
                
                $sql2="UPDATE register_tb SET name='$name', address='$address', blood_grp='$bloodgroup', phnum='$phnum', date='$date' WHERE id='$id'";
                $result2=mysqli_query($conn,$sql2);

                if($result2){
                    echo '<script>alert("Data Updated!!"); </script>';
                    header("Location: view.php");
                    exit();
                }else{
                    echo '<script>alert("Data Not Updated"); </script>';
                }
            }

            ?>

        
    </div>
    <?php
            }
            }else{
                echo '<script>alert("No Records Found!!"); </script>';
            }
    ?>
</body>
</html>