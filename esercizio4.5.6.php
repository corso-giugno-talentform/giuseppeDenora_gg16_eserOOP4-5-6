<?php
//updated
class Company {
    public $name;
    public $location;
    private $employees = 0;
    
    public static $monthlySalary = 1500;
    public static $totalSpent = 0;

    private static $instances = [];

    public function __construct(string $name, string $location, int $employees = 0) {
        $this->name = $name;
        $this->location = $location;
        $this->employees = $employees;
        self::$instances[] = $this;
    }

    public function getInfo() {
        if ($this->employees > 0) {
           echo "L'ufficio " . $this->name . " con sede in " . $this->location . " ha ben " . $this->employees . " dipendenti. \n";
        } else {
            echo "L'ufficio " . $this->name . " con sede in " . $this->location . " non ha dipendenti. \n";
        }
    }

    public function getAnnualCost() {
        return $this->employees * self::$monthlySalary * 12;
    }

    // Esercizio 5: 
    public function addToGlobalTotal() {
        $partial = $this->getAnnualCost();
        self::$totalSpent += $partial;
        echo "Costo annuale dell'azenda  {$this->name}: {$partial} € | fin ora : " . self::$totalSpent . " €\n";
    }

    // Esercizio 6: metodo statico che calcola una sola volta il totale di tutte le aziende
    public static function calculateGlobalTotal() {
        $total = 0;
        foreach (self::$instances as $instance) {
            $total += $instance->getAnnualCost();
        }
        return $total;
    }
}

$company1 = new Company('Apple', 'USA', 3);
$company2 = new Company('Barilla', 'ITA', 3);
$company3 = new Company('Nintendo', 'JAP', 5);
$company4 = new Company('Nokia', 'FIN', 10);
$company5 = new Company('Xiaomi', 'CHI', 3);

$companies = [$company1, $company2, $company3, $company4, $company5];

// Esercizio 2: 
var_dump($companies);

// Esercizio 3
echo "\n******** INFO ********\n";
foreach ($companies as $company) {
    $company->getInfo();
}

// Esercizio 4
echo "\n******** Esercizio 4 ********\n";
foreach ($companies as $company) {
    echo "Spesa annuale di {$company->name}: " . $company->getAnnualCost() . " €\n";
}

// Esercizio 5
echo "\n******** Esercizio 5 ********\n";
$company1->addToGlobalTotal();
$company2->addToGlobalTotal();
$company3->addToGlobalTotal();

// Esercizio 6
echo "\n******** Esercizio 6 ********\n";
echo "Totale spesa di tutte le sedi: " . Company::calculateGlobalTotal() . " €\n";
