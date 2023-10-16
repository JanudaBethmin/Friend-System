<?php

// We need to start a seesion in order to create $_SESSION varibale.
// We use them to check whether the user is logined to the system 
// And to check who is logged in.
session_start();

include('dbconnection.php');
include('header.html');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
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
            
            <h3>Login Page</h3>
            <br>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

            <label for="">Email: </label> &nbsp
            <input type="email" name="email">
            <br>
            <label for="">Password: </label> &nbsp
            <input type="password" name="password">
            <br><br>
            <input type="submit" name="login" value="Log In" >
            <!-- clear button -> input type is reset -->
            <input type="reset" name="clear" value="Clear">
            </form>
            <br>
            <?php
                if(isset($_POST['login'])){
    
                    try {
                
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                
                        if(empty($email)) {
                            echo "Enter your email.<br>";
                        } else if (empty($password)) {
                            echo "Enter your password.<br>";
                        } else {
                
                            $sql = "SELECT friend_id,profile_name,password FROM friends WHERE friend_email = '{$email}' ";
                            $result = mysqli_query($conn, $sql);
                
                
                            $row = mysqli_fetch_assoc($result);
                            
                            if ($password == $row['password']) {
                                // Setting a $_SESSION varibales
                                // The Key of the value of associative array here will be email
                                // The value is $email 
                                $_SESSION['id'] = $row['friend_id'];
                                $_SESSION['name'] = $row['profile_name'];
                                $_SESSION['email'] = $email;
                                header('Location: friends.php');
                            } else {
                                echo "Email / Password is incorrect.";
                            }
                            
                    }
                 } catch (mysqli_sql_exception) {
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