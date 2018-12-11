<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 11/12/18
 * Time: 14:01
 */

namespace App\Controller;



use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('/home.html.twig');
    }
}

