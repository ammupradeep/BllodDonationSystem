<?php
include_once 'db_conn.php';

$sql="SELECT * FROM register_tb";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>View Donors</title>
</head>
<body>
    <div class="form2">
        <h2>Registered Donors</h2>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            ?>
            <table>
            <tr>
                <th>Registration Number</th>
                <td><?php echo $row["id"]; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $row["name"]; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $row["address"]; ?></td>
            </tr>
            <tr>
                <th>Blood Group</th>
                <td><?php echo $row["blood_grp"]; ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo $row["phnum"]; ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $row["date"]; ?></td>
            </tr>
            </table>
            
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <button type="submit" formaction="edit.php" >EDIT</button>
                <button type="submit" formaction="delete.php" name="delete">DELETE</button>
            </form>
            <br>
            <?php
            $i++;
        }
        ?>
        <!-- <div class="clearfix"></div> -->
        <?php
        }
        else{
            echo '<script>alert("No Records Found!!"); </script>';
        }
        ?>
        
    </form>
    </div>
    
</body>
</html>