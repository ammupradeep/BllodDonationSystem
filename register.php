<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Register Donor</title>
</head>
<body>
    <div class="form1">
        <form action="login-check.php" method="post">
            <h2>DONOR Registration</h2>
    
            <?php if(isset($_GET['error'])){?>
                <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
    
    
            <?php if(isset($_GET['success'])){ ?>
                <p class="success"> <?php echo $_GET['success']; ?></p>
            <?php } ?>
    
            <label>Name</label>
            <input type="text" name="name" placeholder="Name"><br>
            
            <label>Address</label>
            <input type="text" name="address" placeholder="Address"><br>
    
            <label>Blood Group</label>
            <select class="dropdown" name="group">
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
            <input type="number" name="phnum" placeholder="Phone Number"><br>
    
            <label>Date</label>
            <input type="date" name="date"><br>
    
            <button type="submit">REGISTER</button>
        </form>
    </div>
</body>
</html>