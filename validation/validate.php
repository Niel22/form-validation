<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <?php
    $nameErr = $emailErr =$genderErr = $websiteErr = "";

    $name = $email = $gender = $comment = $website = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name'])){
            $nameErr = 'Please enter a valid name';
        }
        else {
            $name = val($_POST['name']);
            if(!preg_match("/^[a-zA-Z-']*$/", $name)){
                $nameErr = "Only Letters and White spaces allowed";
            }
        }
        
        if(empty($_POST['email'])){
            $emailErr = 'Please enter a valid email Address';
        }
        else {
            $email = val($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "The email address is not valid";
            }
        }

        if(empty($_POST['website'])){
            $websiteErr = 'Please enter a valid Website';
        }
        else {
            $website = val($_POST['website']);
            if(!filter_var($email, FILTER_VALIDATE_URL)){
                $emailErr = "The Website url is not valid";
            }
        }

        if(empty($_POST['comment'])){
            $comment = '';
        }
        else {
            $comment = val($_POST['comment']);
        }

        if(empty($_POST['gender'])){
            $genderErr = 'Please Select a gender';
        }
        else {
            $gender = val($_POST['gender']);
        }
    }

    function val($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Full Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        Email Address: <input type="email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Website: <input type="text" name="age">
        <span class="error">* <?php echo $websiteErr;?></span>
        <br><br>
        Comment: <textarea name="comment" cols="30" rows="10"></textarea>
        <span class="error">* <?php echo $comment;?></span>
        <br><br>
        Gender: 
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Your Input</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    echo "<br>";
    ?>
</body>
</html>