<?php
declare(strict_types = 1);

namespace AppBundle\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class EmployeeRepositoryTest
 * @package AppBundle\Tests\Repository
 */
class EmployeeRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testEmployeeById()
    {
        $employee = $this->em
            ->getRepository('AppBundle:Employee')
            ->find(1);

        $this->assertCount(1, $employee);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}
