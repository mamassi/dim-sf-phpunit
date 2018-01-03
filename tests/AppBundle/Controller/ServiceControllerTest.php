<?php
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 17/07/17
 * Time: 10:39
 */
namespace AppBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;

use PHPUnit\Framework\TestCase;

use AppBundle\Service\ServiceClass;

/**
 * Class ServiceControllerTest
 * @package AppBundle\Controller
 */
class ServiceControllerTest extends TestCase
{
    public function testServiceController()
    {
        $controller = new ServiceController();

        $service = $this->getMockBuilder(ServiceClass::class)
            ->getMock();
        $container = $this->getMockBuilder(ContainerInterface::class)
            ->getMock();

        $container->expects($this->once())
            ->method("get")
            ->with($this->equalTo('dim_sf_phpunit.service_class'))
            ->will($this->returnValue($service));

        $controller->setContainer($container);

        $controller->serviceAction();
    }
}
