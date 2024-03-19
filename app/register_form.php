<?php
//Auteur: Lorenzo van der Horst
require_once('classes/user.php');
// Is de register button aangeklikt?
if (isset($_POST['register-btn'])) {
    require_once('classes/user.php');
    $user = new User();
    $errors = [];

    $user->username = $_POST['username'];
    $user->SetPassword($_POST['password']);

    $user->ShowUser();

// Create an instance of the User class
$user = new User();

// Set properties and perform registration
$user->username = $_POST['username'];
$user->SetPassword($_POST['password']);

// Validate and register the user
$errors = $user->ValidateUser();

// Rest of your code...

    if (count($errors) == 0) {
        // Register user
        $errors = $user->RegisterUser();
    }

    if (count($errors) > 0) {
        $message = "";
        foreach ($errors as $error) {
            $message .= $error . "\\n";
        }

        echo "
        <script>alert('" . $message . "')</script>
        <script>window.location = 'register_form.php'</script>";

    } else {
        echo "
            <script>alert('" . "User registered" . "')</script>
            <script>window.location = 'login_form.php'</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<body>

    <h3>PHP - PDO Login and Registration</h3>
    <hr/>

    <form action="" method="POST">    
        <h4>Register here...</h4>
        <hr>
        
        <div>
            <label>Username</label>
            <input type="text"  name="username" />
        </div>
        <div >
            <label>Password</label>
            <input type="password"  name="password" />
        </div>
        <br />
        <div>
            <button type="submit" name="register-btn">Register</button>
        </div>
        <a href="index.php">Home</a>
    </form>

</body>
</html>
