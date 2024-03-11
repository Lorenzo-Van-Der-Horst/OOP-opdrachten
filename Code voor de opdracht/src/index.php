<?php
    // Functie: programma login OOP 
    // Auteur: Wigmans

    // Initialisatie

    require "../vendor/autload.php";

    //require_once 'classes/user.php';
    use LoginOpdracht\classes\user;
    
    session_start();



    // Controleer of de gebruiker is ingelogd
    if(isset($_SESSION['username']))
        $user = new User($_SESSION['username'], '', '', '');

		?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Login and Registration</title>
</head>
<body>

    <h3>PDO Login and Registration</h3>
    <hr/>

    <h3>Welcome op de HOME-pagina!</h3>
    <br />

    <?php
        require_once 'classes/user.php';

        // Controleer of de gebruiker is ingelogd
        if(isset($_SESSION['username'])){
            $user = new User($_SESSION['username'], '', '', '');

            // Selecteer gebruikersgegevens uit de database
            $user->getUserDetails();

            // Print gebruikersgegevens
            echo "<h2>Het spel kan beginnen</h2>";
            echo "Je bent ingelogd als: " . $_SESSION['username'] . "<br/>";
            echo "Username: " . $user->username . "<br/>";
            echo "Email: " . $user->email . "<br/>";
            echo "<br><br>";
            echo '<a href="?logout=true">Logout</a>';
        } else {
            // Gebruiker is niet ingelogd, toon inlogknop
            echo "U bent niet ingelogd. Log in om verder te gaan.<br><br>";
            echo '<a href="login_form.php">Login</a>';
        }
    ?>

</body>
</html>
