<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="salary", type="float")
     */
    private $salary;

    /**
     * @var float
     *
     * @ORM\Column(name="bonus", type="float")
     */
    private $bonus;


    /**
     * Get id
     *
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set salary
     *
     * @param float $salary
     *
     * @return Employee
     */
    public function setSalary($salary):Employee
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return float
     */
    public function getSalary():float
    {
        return $this->salary;
    }

    /**
     * Set bonus
     *
     * @param float $bonus
     *
     * @return Employee
     */
    public function setBonus($bonus):Employee
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return float
     */
    public function getBonus():float
    {
        return $this->bonus;
    }
}

