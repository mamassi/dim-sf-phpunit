<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 14/07/17
 * Time: 23:28
 */
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 * @package AppBundle\Command
 */
class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates a new user.')
            ->addArgument('username', InputArgument::OPTIONAL, 'User name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');

        if(count($username) > 0){
            $output->writeln('Username: '.$username);
        }else{
            $output->writeln('Please enter a name!');
        }
    }
}
