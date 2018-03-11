<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.18.
 * Time: 15:30
 */
declare(strict_types=1);

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{

    public function loginAction(Request $request, AuthenticationUtils $authUtils): Response
    {
        $error=$authUtils->getLastAuthenticationError();

        $lastname=$authUtils->getLastUsername();

        return $this->render('AppBundle:Login:login.html.php',
            [
                'error'=>$error,
                'lastName'=>$lastname
        ]);
    }

    public function checkAction(Request $request)
    {
        return $this->redirectToRoute('homepage');
    }
}