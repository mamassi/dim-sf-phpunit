<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 14/07/17
 * Time: 23:39
 */
namespace AppBundle\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

use AppBundle\Command\CreateUserCommand;

/**
 * Class CreateUserCommandTest
 * @package AppBundle\Tests\Command
 */
class CreateUserCommandTest extends KernelTestCase
{
    protected $createUserCommand;

    public function setUp()
    {
        $this->createUserCommand = new CreateUserCommand();
    }

    public function testExecute()
    {
        self::bootKernel();
        $application = new Application(self::$kernel);

        $application->add($this->createUserCommand);

        $command = $application->find('app:create-user');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'  => $command->getName(),
            // pass arguments to the helper
            'username' => 'Dupont'
        ));

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertContains('Username: Dupont', $output);
    }
}
