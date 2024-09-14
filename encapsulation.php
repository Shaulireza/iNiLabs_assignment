<?php
class Employee {
    private $name;
    private $salary;
    public function __construct($name, $salary) {
        $this->name = $name;
        $this->setSalary($salary);
    }
    public function getSalary() {
        return $this->salary;
    }
    public function setSalary($newSalary) {
        if ($newSalary >= 0) {
            $this->salary = $newSalary;
        }
    }
    public function displaysalaryinfo() {
        return "Employee Name: " . $this->name . ", Salary: " . $this->getSalary();
    }
}
$employee = new Employee("Shauli", 25000);
echo $employee->displaysalaryinfo() . "<br><br>"; 
$employee->setSalary(35000);
echo $employee->displaysalaryinfo();

?>

