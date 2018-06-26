<?php

session_start();
ob_start();
if(array_key_exists("id", $_COOKIE) && $_COOKIE['id']){

    $_SESSION['id'] = $_COOKIE['id'];
}

if(array_key_exists("id", $_SESSION) && $_SESSION['id']){

    echo "<p id='loggedInText'>logged in! <a href='index.php?logout=1'>log out</a></p>";

    include("connection.php");

    $query = "SELECT diary FROM `users` WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";

    $row = mysqli_fetch_array(mysqli_query($link,$query));

    $diaryContent = $row['diary'];


} else{

    header("Location: index.php");

}

include("header.php");

ob_end_flush();
?>



<div class="container-fluid">

    <textarea id="diary" class="form-control"><?php echo $diaryContent ; ?></textarea>

</div>





<?php
include("footer.php");
?>



