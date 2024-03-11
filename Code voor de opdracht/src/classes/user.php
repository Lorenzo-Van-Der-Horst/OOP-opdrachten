<?php

    namespace LoginOpdraht\classes;


class User {
    // Eigenschappen 
    public $username;
    public $email;
    private $password;
    private $role;

    // Constructor om een User-object te initialiseren
    public function __construct($username, $email, $password, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Functie om het wachtwoord in te stellen
    public function setPassword($password) {
        $this->password = $password;
    }

    // Functie om het wachtwoord op te halen
    public function getPassword() {
        return $this->password;
    }

    // Functie om de gebruikersgegevens te tonen
    public function showUser() {
        echo "<br>Username: $this->username<br>";
        echo "<br>Email: $this->email<br>";
    }

    // Validatie voor het registreren van een gebruiker
    public function validateRegister() {
        $errors = [];

        // Voeg validatielogica toe voor het registreren van een gebruiker

        return $errors;
    }

    // Functie om een gebruiker in de database te registreren
    public function registerUser() {
        $errors = $this->validateRegister();

        if (count($errors) == 0) {
            // Voeg logica toe om de gebruiker in de database te registreren
            // Als de registratie succesvol is, retourneer true, anders retourneer false
            // Je kunt bijvoorbeeld SQL-query's uitvoeren om de gebruiker toe te voegen aan de database
        }

        return $errors;
    }

    // Functie om in te loggen
    public function loginUser($password) {
        // Implementeer de inloglogica
        // Controleer of de gebruikersnaam en het wachtwoord overeenkomen met wat in de database is opgeslagen
        // Als ze overeenkomen, retourneer true, anders retourneer false
    }

    // Functie om uit te loggen
    public function logout() {
        // Implementeer de uitloglogica
        // Verwijder de sessie-variabelen en vernietig de sessie
        // Stuur de gebruiker naar de inlogpagina
    }

    // Functie om te controleren of de gebruiker is ingelogd
    public function isLoggedIn() {
        // Implementeer de logica om te controleren of de gebruiker is ingelogd
        // Gebruik sessievariabelen of andere methoden om dit te controleren
    }

    // Functie om de gebruikersrol op te halen
    public function getRole() {
        return $this->role;
    }

    // Functie om de gebruiker te valideren
    public function validateLogin() {
        // Implementeer de validatielogica voor het inloggen van een gebruiker
        // Controleer bijvoorbeeld of de gebruikersnaam en het wachtwoord zijn ingevuld
    }

    // Functie om de gebruikersgegevens op te halen
    public function getUserDetails() {
        // Implementeer de logica om de gebruikersgegevens op te halen, bijvoorbeeld uit een database
    }
}

?>