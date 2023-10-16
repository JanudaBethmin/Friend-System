<?php
// Starting the session
session_start();

// If someone try to access the page without login they will be redirected to login
if(!isset($_SESSION['email'])) {
    header('Location: login.php');
}

include('dbconnection.php');
include('header.html');

$sql = " SELECT num_of_friends FROM friends WHERE friend_email = '{$_SESSION['email']}' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$num_of_friends = $row['num_of_friends'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Page</title>
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
    <div id="outer-div">
        <div id="inner-div">
            <h3><?php echo strtoupper($_SESSION['name'])."'s"; ?> Add Friend page </h3>
            <br>
            <h3>Total number of friends is <?php echo $num_of_friends ?></h3>
            <br>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="submit" name="addfriend" value = "Add Friend"> &nbsp
                <input type="submit" name="logout" value = "Log Out">
            </form>
        </div>

    </div>
</body>
</html>

<?php

if (isset($_POST['addfriend'])){
    header('Location: friendsadd.php');
}
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}

include('footer.html');
?>