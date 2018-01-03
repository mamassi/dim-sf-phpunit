<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mamadou
 * Date: 17/07/17
 * Time: 10:22
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ServiceController
 * @package AppBundle\Controller
 */
class ServiceController extends Controller
{
    /**
     * @Route("/service")
     */
    public function serviceAction()
    {
        $service = $this->container->get("dim_sf_phpunit.service_class");

        if($service){
            $content = $service->someMethod();
        }else{
            $content =  'This is not a service text';
        }

        $response = new JsonResponse($content);

        return $response;
    }
}
