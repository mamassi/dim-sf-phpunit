<?php
declare(strict_types = 1);

namespace AppBundle\Tests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use AppBundle\Entity\Employee;
use AppBundle\Form\EmployeeType;

class EmployeeTypeTest extends TypeTestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testSubmitValidData()
    {
        $formData = array(
            'salary' => 1000,
            'bonus' => 1100
        );

        //EmployeeType
        $form = $this->factory->create(EmployeeType::class);

        $employee = new Employee();
        $employee->setSalary(1000);
        $employee->setBonus(1100);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($employee, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
