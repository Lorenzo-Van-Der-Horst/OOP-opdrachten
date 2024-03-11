<?php
    // Is de login button aangeklikt?
    if(isset($_POST['login-btn']) ){

        require_once('classes/user.php');

        // Ontvang gebruikersnaam en wachtwoord van het formulier
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Maak een nieuwe instantie van de User-klasse met gebruikersnaam en wachtwoord
        $user = new User($username, $password, '', '');
        // Validatie gegevens
        $errors = $user->validateLogin();

        // Indien geen fouten dan inloggen
        if(empty($errors)){
            // Inloggen
            if ($user->loginUser($user->getPassword())){
                // Sessie starten
                session_start();
                // Sessievariabelen instellen
                $_SESSION['username'] = $user->username;
                $_SESSION['role'] = $user->getRole();
                // Redirect naar homepagina
                header("location: index.php");
                exit();
            } else {
                $errors[] = "Inloggen mislukt. Controleer uw gebruikersnaam en wachtwoord.";
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
        <h4>Login here...</h4>
        <hr>
        
        <label>Username</label>
        <input type="text" name="username" />
        <br>
        <label>Password</label>
        <input type="password" name="password" />
        <br>
        <button type="submit" name="login-btn">Login</button>
        <br>
        <a href="register_form.php">Registration</a>
    </form>
        
</body>
</html>
