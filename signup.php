<?php
include('dbconnection.php');
include('header.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <style>

       #outer-div {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
       }

       #inner-div {
            padding: 150px;
       }
       
    </style>
</head>
<body>
<div id = "outer-div">
    <div id = "inner-div">

        <h3>Registration Form</h3>
        <br>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

        <label for="">Email: </label> &nbsp
        <input type="email" name="email">
        <br>
        <label for="">Profile Name: </label> &nbsp
        <input type="text" name="name">
        <br>
        <label for="">Password: </label> &nbsp
        <input type="password" name="password">
        <br>
        <label for="">Confirm Password: </label> &nbsp
        <input type="password" name="confirm_password">
        <br><br>
        <input type="submit" name="signup" value="Sign Up" >
        <input type="reset" name="clear" value="Clear">
        </form>

        <?php
            if(isset($_POST['signup'])){

                try {
            
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
            
                    if(empty($email)){
                        echo "Enter an email.<br>";
                    } else if (empty($name)) {
                        echo "Enter an username.<br>";
                    } else if (empty($password)) {
                        echo "Enter a password.<br>";
                    } else if (empty($confirm_password)) {
                        echo "Confirm your password.<br>";
                    } else if (!(strcmp($password,$confirm_password)== 0)) {
                        echo "Password confirmation failed.<br>";
                    } else {
            
                        $sqlall = "SELECT * FROM friends";
                        $result = mysqli_query($conn, $sqlall);
            
                        if(mysqli_num_rows($result)>0){
            
                            while ($row = mysqli_fetch_assoc($result)){
                                if($email == $row['friend_email']) {
                                    echo "This email is already on use.<br>";
                                } else if ($name == $row['profile_name']) {
                                    echo "This profile name is already on use.<br>";
                                }
                            }
                        }
            
                        $sql = "INSERT INTO friends ( friend_email, profile_name, password ) VALUES ('{$email}', '{$name}', '{$password}')";
                        mysqli_query($conn, $sql);
                        header('Location: index.php');
            
                } 
                
                }catch (mysqli_sql_exception) {
                    echo "";
                }
            
                }
        ?>
    </div>
</div>
    

</body>
</html>

<?php
    include('footer.html');
?>