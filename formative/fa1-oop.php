<?php

class Company {
    private $email;
    public $companyName;
    public $companyPhone;

    public function setName($name) {
        $this->companyName = $name;
    }

    public function setEmail() {
        $convert = str_replace(' ', '.', $this->companyName);
        $this->email = strtolower($convert) . '.department@ust.edu.ph';
    }

    public function setNumber($number) {
        $this->companyPhone = $number;
    }

    public function displayInfo() {
        echo nl2br("\n==== COMPANY INFORMATION ====" . "\n" .
        "Company Email: " . $this->email . "\n" .
        "Company Name: " . $this->companyName . "\n" .
        "Company Number: " . $this->companyPhone);
    }

 }

class Employee extends Company {
    public function __construct(private $empEmail) {
        $this->empEmail  = $empEmail;
    }

    function getEmpMail() {
        return $this->empEmail;
    }

    function getSalary($days) {
        $salary = 500;
        return $salary *= $days;
    }

    function __call($name, $arg) {
        if($name == 'printInfo') {
            switch(count($arg)) {
                default:
                    return nl2br("\nEmployee Email: " . $this->getEmpMail());
                case 1:
                    return nl2br("\nTotal Salary: ") . $this->getSalary($arg[0]);
            }
        }
    }

}

// FOR MULTILEVEL
class Boss extends Employee {
    public function __construct(private $position) {
        $this->position = $position;
    }

    function getPosition () {
        return $this->position;
    }
}


// FOR HIERARICHAL
class Jobs extends Company {
    public function displayInfo() {
        parent::displayInfo();
        echo nl2br("\nThere are a lot of jobs available for this company.\n" .
        "Contact us now.") ;    
    }
}

// INSTANTIATE 3 OBJS
$emp1 = new Employee('employee@gmail.com');
$emp1 ->setName('Nicole Oraya');
$emp1 ->setEmail();
$emp1 ->setNumber(12345);
$emp1 ->displayInfo();
echo $emp1 -> printInfo();
echo $emp1 -> printInfo(5);

echo "<br/>";

$boss = new Boss('Boss');
$boss ->setName('Oraya');
$boss ->setEmail();
$boss ->setNumber(12346);
$boss ->displayInfo();
echo nl2br("\n".$boss -> getPosition());
echo $emp1 -> printInfo(15);

echo "<br/>";

$corporate = new Jobs();
$corporate->setName("CORPSEPORAL HANDLER");
$corporate->setEmail();
$corporate->setNumber(12347);
$corporate->displayInfo();

?>