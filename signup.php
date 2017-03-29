<?php // Script 9 - signup.php - sticky form

require "dbfunctions.php";
$page_title = "Sign Up"; // Set Page Title
include ('includes/header.html');
$fname="";
$sname="";
$email="";
//Check method used on request page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //get values from form data
    $fname = db_quote($_POST['fname']);
    $sname = db_quote($_POST['sname']);
    $email = db_quote($_POST['email']);
    $course = db_quote($_POST['course']);
    //prepare query string
    $qstring = "INSERT INTO tbl_booking (forename, surname, email, course) VALUES ($fname,$sname,$email,$course);";
    // display query string on page as it is helpful to help you to find errors
    echo $qstring;
    echo "<br/><br/>";
    // RUN QUERY
    $result = db_query($qstring);
    if ($result === false) {
        $error = db_error();
        echo $error;
        echo "<br/><br/>";
        echo "It didn't work!";
        echo "<br/><br/>";
    } else {
        echo "<br/><br/>";
        echo "Success";
    }
}


?>

<form action="signup.php" method="post" class="basic-grey">
    <h2>Sign-Up Form
        <span>Please complete all of the fields</span>
    </h2>
    <label>
        <span>Your First Name :</span>
        <input id="fname" name="fname" type="text" placeholder="Your First Name(s)" value="<?php echo $fname; ?>" />
    </label>

    <label>
        <span>Your Surname :</span>
        <input id="sname" name="sname" type="text" placeholder="Your Surname" value="<?php echo $sname; ?>" />
    </label>

    <label>
        <span>Your Email :</span>
        <input id="email" name="email" type="text" placeholder="Valid Email Address" value="<?php echo $email; ?>" />
    </label>

    <label>
        <span>Course :</span><select name="course" >
        <option value="CS" selected="selected">Computer Science</option>
        <option value="IT3">IT BTEC L3</option>
        <option value="IT2">IT BTEC L2</option>
        </select>
    </label>
    <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Submit" />
    </label>
</form>

<?php
include ('includes/footer.html');
?>

    /**
 * Created by PhpStorm.
 * User: Richard
 * Date: 23/03/2017
 * Time: 11:45
 */