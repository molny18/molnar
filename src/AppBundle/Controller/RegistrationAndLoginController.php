<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.19.
 * Time: 12:42
 */
declare(strict_types=1);
namespace AppBundle\Controller;

use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationAndLoginController extends Controller
{
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $admin=new Admin();
        $form=$this->createForm(AdminType::class,$admin);
        $form->handleRequest($request);

        if($form->isSubmitted() &&  $form->isValid())
        {
            $password=$passwordEncoder->encodePassword($admin,$admin->getPlainPassword());
            $admin->setPassword($password);
            $admin->setUsername($admin->getUsername());
            $admin->setEmail($admin->getEmail());
            $admin->setIsActive(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();
            $this->addFlash('notice','Reg Success!');
            return $this->redirectToRoute('login');

        }

        return $this->render('AppBundle:Registration:registration.html.twig',[
           'form'=>$form->createView(),
        ]);

    }
}