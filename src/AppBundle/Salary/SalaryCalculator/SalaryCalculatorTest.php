<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 11/07/17
 * Time: 14:39
 */
namespace AppBundle\Salary\SalaryCalculator;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;
use AppBundle\Entity\Employee;
use AppBundle\Salary\SalaryCalculator;

class SalaryCalculatorTest extends TestCase
{

    public function testCalculateTotalSalary()
    {
        // First, mock the object to be used in the test
        $employee = $this->getMockBuilder(Employee::class)->getMock();
        $employee->expects($this->once())
            ->method('getSalary')
            ->will($this->returnValue(1000));
        $employee->expects($this->once())
            ->method('getBonus')
            ->will($this->returnValue(1100));

        // Now, mock the repository so it returns the mock of the employee
        $employeeRepository = $this->getMockBuilder(EntityRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $employeeRepository->expects($this->once())
            ->method('find')
            ->will($this->returnValue($employee));

        // Last, mock the EntityManager to return the mock of the repository
        $entityManager = $this->getMockBuilder(EntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($employeeRepository));

        $salaryCalculator = new SalaryCalculator($entityManager);
        $this->assertEquals(2100, $salaryCalculator->calculateTotalSalary(1));
    }
}
