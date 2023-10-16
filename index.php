<?php
include('header.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIENDS</title>
</head>
<style>

    #outer-div {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    #inner-div {
        padding : 150px;
    }

    input {
        padding : 10px;
        margin-right: 20px;
        background-color: orange;
        color : white;
    }

</style>
<body>
    <div id = "outer-div" >
        <div id = "inner-div" >
            <h3>Practical Exam: Home Page</h3>
            <br>
            Name : Januda Bethmin &nbsp Student ID : SE/2020/051
            <br>
            I declare this project is my individual work.
            <br>
            I have not worked collaboratively nor I have copied from any other student's work.
            <br><br>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
               <input type="submit" name="register" value="Register"> 
               <input type="submit" name="login" value="Login"> 
            </form>
        </div>
        
    </div>
</body>
</html>

<?php

if (isset($_POST['register'])){
    header('Location: signup.php');
}

if (isset($_POST['login'])){
    header('Location: login.php');
}

include('footer.html');
?>