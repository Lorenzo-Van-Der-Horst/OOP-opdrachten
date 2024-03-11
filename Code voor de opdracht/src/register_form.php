<?php
// Is de register button aangeklikt?
if(isset($_POST['register-btn'])){
    require_once('classes/user.php');
    $user = new User($_POST['username'], $_POST['password'], '', '');

    $user->username = $_POST['username'];
    $user->setPassword($_POST['password']);

    // Validatie gegevens
    $errors = $user->validateRegister();

    // Indien geen fouten dan registreren
    if(empty($errors)){
        // Registreren
        $registrationErrors = $user->registerUser();

        if(!empty($registrationErrors)){
            $errors = array_merge($errors, $registrationErrors);
        } else {
            // Registratie succesvol
            echo "<script>alert('Gebruiker geregistreerd')</script>";
            header("location: login_form.php");
            exit();
        }
    }

    if(!empty($errors)){
        $message = implode("<br>", $errors);
        echo "<script>alert('$message')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
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
        <div>
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
