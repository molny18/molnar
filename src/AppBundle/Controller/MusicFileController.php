<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MusicFile;
use AppBundle\Manager\BaseManager;
use AppBundle\Service\Handler\MusicRefreshHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Musicfile controller.
 *
 * @Route("music")
 */
class MusicFileController extends Controller
{
    /**
     * Lists all musicFile entities.
     *
     * @Route("/", name="music_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $manager = $this->getManager();
//        $refresher=$this->getMusicRefreshHandler();
//        $dir= $refresher->handleRefresh();

        $musicFiles = $manager->findAll();

        return $this->render('musicfile/index.html.twig', array(
            'musicFiles' => $musicFiles,
        ));
    }

    public function refreshAction(Request $request) :Response
    {

    }


    private function getManager(): BaseManager
    {
        return $this->container->get('app.music.manager');
    }

    private function getMusicRefreshHandler(): MusicRefreshHandler
    {
        return $this->container->get('app.music_refresh.handler');
    }

    /**
     * Creates a new musicFile entity.
     *
     * @Route("/new", name="music_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $musicFile = new Musicfile();
        $form = $this->createForm('AppBundle\Form\MusicFileType', $musicFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($musicFile);
            $em->flush();

            return $this->redirectToRoute('music_show', array('id' => $musicFile->getId()));
        }

        return $this->render('musicfile/new.html.twig', array(
            'musicFile' => $musicFile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a musicFile entity.
     *
     * @Route("/{id}", name="music_show")
     * @Method("GET")
     */
    public function showAction(MusicFile $musicFile)
    {
        $deleteForm = $this->createDeleteForm($musicFile);

        return $this->render('musicfile/show.html.twig', array(
            'musicFile' => $musicFile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing musicFile entity.
     *
     * @Route("/{id}/edit", name="music_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MusicFile $musicFile)
    {
        $deleteForm = $this->createDeleteForm($musicFile);
        $editForm = $this->createForm('AppBundle\Form\MusicFileType', $musicFile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('music_edit', array('id' => $musicFile->getId()));
        }

        return $this->render('musicfile/edit.html.twig', array(
            'musicFile' => $musicFile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a musicFile entity.
     *
     * @Route("/{id}", name="music_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MusicFile $musicFile)
    {
        $form = $this->createDeleteForm($musicFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($musicFile);
            $em->flush();
        }

        return $this->redirectToRoute('music_index');
    }

    /**
     * Creates a form to delete a musicFile entity.
     *
     * @param MusicFile $musicFile The musicFile entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MusicFile $musicFile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('music_delete', array('id' => $musicFile->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
