<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.02.28.
 * Time: 14:57
 */
declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends Controller
{
    public function indexAction(Request $request): Response
    {
        return $this->render('AppBundle:Media:index.html.php',[

        ]);
    }

    public function musicAction(Request $request): Response
    {
        return $this->render('AppBundle:Media:music.html.php');
    }

}