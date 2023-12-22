<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fulllname = $email = $gender = $comment = $number = $age = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fulllname = val($_POST['name']);
        $email = val($_POST['email']);
        $gender = val($_POST['gender']);
        $comment = val($_POST['comment']);
        $number = val($_POST['number']);
        $age = val($_POST['age']);
    }

    function val($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Form Validation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Full Name: <input type="text" name="name">
        <br><br>
        Email: <input type="email" name="email">
        <br><br>
        Number(Optional): <input type="text" name="number">
        <br><br>
        Age: <input type="text" name="age">
        <br><br>
        Comment: <textarea name="comment" cols="30" rows="10"></textarea>
        <br><br>
        Gender: 
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <br><br>
        <input type="submit" name="submit" value="Click Here">
    </form>

    <?php
    echo "<h2>Your Input</h2>";
    echo $fulllname;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $age;
    echo "<br>";
    echo $number;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    echo "<br>";
    ?>
</body>
</html>