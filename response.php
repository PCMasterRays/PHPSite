<?php


$page_title = 'Response'; // Set Page Title
include ('includes/header.html'); // Include Page Header

?>

<h1>Response</h1>

<?php
    $sender=$_POST['sender'];
    $email=$_POST['email'];
    $msg=$_POST['message'];
    $subject=$_POST['subject'];
    $name_array=explode(" ",$sender);
    if ($subject="General Question") {
        echo "<p>Thanks for contacting us with your general question, $name_array[0]." ;
    }
    else {
        echo "<p>Thanks for contacting us about $subject, $name_array[0]." ;
    }
    echo "<br/>";
    echo "We will be in touch with you soon on <strong>$email</strong>.</p>";
    echo "<br/>";
    echo "<p>The message you sent was <em>$msg</em>.</p>";

?>

<?php
include ('includes/footer.html'); //includes page footer
?>

/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 23/03/2017
 * Time: 11:25
 */