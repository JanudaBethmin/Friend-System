<?php
session_start();

include('dbconnection.php');
include('header.html');

if(!isset($_SESSION['email'])) {
    header('Location: login.php');
}

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $user_id = $_SESSION['id'];

    // To the entry delete from my friends table
    $sqldel = "DELETE FROM myfriends WHERE friend_id1 = '{$user_id}' AND friend_id2 = '{$id}' ";
    mysqli_query($conn, $sqldel);

    // To update number of friends
    $sqlup = "UPDATE friends SET num_of_friends = num_of_friends - 1 WHERE friend_email = '{$_SESSION['email']}' ";
    mysqli_query($conn, $sqlup);
    header('Location: friendlist.php');
} 


$no_of_friends_per_page = 5;


if(isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 1;
}

$no_of_friends_per_page = 5;
$start = ($page - 1)*$no_of_friends_per_page;

$sql = " SELECT num_of_friends FROM friends WHERE friend_email = '{$_SESSION['email']}' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$num_of_friends = $row['num_of_friends'];

// We need to exclude already added friends
// We use NOT in myfriends to do so
$sqlall = "SELECT friend_id, profile_name FROM friends WHERE friend_id != {$_SESSION['id']}  AND friend_id IN ( SELECT friend_id2 FROM myfriends WHERE friend_id1 = {$_SESSION['id']}) LIMIT $start, $no_of_friends_per_page ";
$resultall = mysqli_query($conn, $sqlall);

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
            text-align: center;
        }

        table, td, tr{
            width: 750px;
            border: 1px solid;
            text-align: center;
        }

</style>
</head>
<body>

    <div id="outer-div">
        <div id="inner-div">
            <h3><?php echo strtoupper($_SESSION['name'])."'s"; ?> Friend List </h3>
            <br>
            <h3>Total number of friends is <?php echo $num_of_friends ?></h3>
            <br>

            <table>
                    <?php 
                        if(mysqli_num_rows($resultall) > 0) {

                            while ($rowall = mysqli_fetch_assoc($resultall)) {
                                echo "<tr>";
                                $name = $rowall['profile_name'];
                                $id = $rowall['friend_id'];
                                echo "<td>{$name}</td>";
                                echo "<td><a href='friendlist.php?id={$id}'><button>Unfriend</button></a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
            </table>
            <br>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="submit" name="addfriends" value = "Add Friends"> &nbsp
                <input type="submit" name="logout" value = "Log Out">
            </form>
            <br>
            <?php 
            
            $sqlmax = "SELECT * FROM friends WHERE friend_id != {$_SESSION['id']} AND friend_id IN ( SELECT friend_id2 FROM myfriends WHERE friend_id1 = {$_SESSION['id']}) ";
            $resultmax = mysqli_query($conn, $sqlmax);
            $num_of_rows = mysqli_num_rows($resultmax);
            $num_of_pages = ceil($num_of_rows / $no_of_friends_per_page);
                for($i=1; $i<=$num_of_pages; $i++) {
                    echo "<a href='friendlist.php?page=$i'>{$i}</a>";
                    echo "&nbsp";
                }
            ?>
            <br>
            <a href='friendlist.php?page=<?php if($page == 1){echo $page;} else{echo $page - 1;} ?>' id='prev'>Prev</a>
            &nbsp;
            <a href='friendlist.php?page=<?php if($page == $num_of_pages){echo $page;} else{echo $page + 1;} ?>' id='next'>Next</a>
        </div>
    </div>

</body>
</html>


<?php

if (isset($_POST['addfriends'])){
    header('Location: friendsadd.php');
}
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
include('footer.html');
?>