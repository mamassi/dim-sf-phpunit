<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 11/07/17
 * Time: 14:32
 */

namespace AppBundle\Salary;

use Doctrine\ORM\EntityManager;

use AppBundle\Entity\Employee;

/**
 * Class SalaryCalculator
 * @package AppBundle\Salary
 */
class SalaryCalculator
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * SalaryCalculator constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $id
     * @return float
     */
    public function calculateTotalSalary($id): float
    {
        $employeeRepository = $this->em->getRepository(Employee::class);
        $employee = $employeeRepository->find($id);

        return $employee->getSalary() + $employee->getBonus();
    }
}
