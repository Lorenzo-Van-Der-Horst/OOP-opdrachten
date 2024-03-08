<?php

namespace Hospital;

// Stap 1: Abstracte klasse Person
abstract class Person {
    private string $name;

    // Abstracte methode om rol te bepalen
    abstract public function determineRole(): string;

    // Setter voor naam
    public function setName(string $name): void {
        $this->name = $name;
    }

    // Getter voor naam
    public function getName(): string {
        return $this->name;
    }
}

// Stap 2: Child class Patient
class Patient extends Person {
    public function determineRole(): string {
        return "Patient";
    }
}

// Stap 3: Abstracte klasse Staff
abstract class Staff extends Person {
    protected float $salary;

    // Abstracte methode om salaris te berekenen
    abstract public function calculateSalary(float $hoursWorked, float $hourlyRate): float;

    // Abstracte methode om salaris in te stellen
    abstract public function setSalary(float $amount): void;
}

// Stap 4: Child class Doctor
class Doctor extends Staff {
    public function determineRole(): string {
        return "Doctor";
    }

    // Implementatie van salarisberekening voor dokters
    public function calculateSalary(float $hoursWorked, float $hourlyRate): float {
        // Voorbeeld: Stel het uurloon van de dokter is $50
        $hourlyRate = 50;
        // De salaris van de dokter wordt berekend op basis van het aantal gewerkte uren
        return $hourlyRate * $hoursWorked; // Uurloon vermenigvuldigd met aantal gewerkte uren
    }

    // Implementatie van salaris instellen voor dokters
    public function setSalary(float $amount): void {
        $this->salary = $amount;
    }
}

// Stap 5: Child class Nurse
class Nurse extends Staff {
    public function determineRole(): string {
        return "Nurse";
    }

    // Implementatie van salarisberekening voor verpleegsters
    public function calculateSalary(float $hoursWorked, float $hourlyRate): float {
        // Voorbeeld: Stel het uurloon van de verpleegster is $30
        $hourlyRate = 30;
        // De salaris van de verpleegster wordt berekend op basis van het aantal gewerkte uren
        return $hourlyRate * $hoursWorked; // Uurloon vermenigvuldigd met aantal gewerkte uren
    }

    // Implementatie van salaris instellen voor verpleegsters
    public function setSalary(float $amount): void {
        $this->salary = $amount;
    }
}

// Stap 6: Klasse Afspraak
class Appointment {
    private Patient $patient;
    private Doctor $doctor;
    private ?Nurse $nurse;
    private string $beginTime;
    private string $endTime;

    public function __construct(Patient $patient, Doctor $doctor, string $beginTime, string $endTime) {
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
    }

    // Methode om de duur van de afspraak te berekenen
    public function calculateDuration(): string {
        $start = new \DateTime($this->beginTime);
        $end = new \DateTime($this->endTime);
        $interval = $start->diff($end);
        return $interval->format('%h hours %i minutes');
    }

    // Methode om de kosten van de afspraak te berekenen
    public function calculateCost(): float {
        $duration = $this->calculateDuration();
        $hoursWorked = intval($duration[0]); // Eerste karakter is het aantal uren
        $hourlyRate = 50; // Uurloon van de dokter (voorbeeldwaarde)

        // Salaris berekenen op basis van rol van de dokter
        $cost = $this->doctor->calculateSalary($hoursWorked, $hourlyRate);

        // Als er een verpleegster aanwezig is, bereken haar bonus
        if ($this->nurse) {
            $cost += $this->nurse->calculateSalary($hoursWorked, $hourlyRate);
        }

        return $cost;
    }

    // Setter voor Nurse
    public function setNurse(Nurse $nurse): void {
        $this->nurse = $nurse;
    }
}

// Voorbeeldgebruik:
$patient = new Patient();
$patient->setName("John Doe");

$doctor = new Doctor();
$doctor->setName("Dr. Smith");
$doctor->setSalary(100); // Voorbeeldsalaris

$appointment = new Appointment($patient, $doctor, "2024-03-08 10:00:00", "2024-03-08 11:30:00");

// Voeg een verpleegster toe aan de afspraak
$nurse = new Nurse();
$appointment->setNurse($nurse);

echo "Duur van de afspraak: " . $appointment->calculateDuration() . "<br>";
echo "Kosten van de afspraak: $" . $appointment->calculateCost();
?>