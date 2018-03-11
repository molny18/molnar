<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.20.
 * Time: 12:57
 */
declare(strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Manager\BaseManager;
use AppBundle\Service\MusicStatusHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;

class MusicController extends Controller
{
    public function IndexAction(Request $request)
    {
        return $this->render('AppBundle:Music:music.html.php', [
            'status'=>$this->getMusicStatusHandler()->getStatusForRender(),
        ]);
    }


    private function handleMusicControll(string $command)
    {
        $event=new Process($command);

        $event->start();
    }

    public function handleAjaxControllAction(Request $request)
    {
        //$command=$request->get('command');
        $command=$this->commandParser($request->get('command'));
        $this->handleMusicControll($command);
        /* @var \AppBundle\Service\MusicStatusHandler $handler*/
        $handler=$this->getMusicStatusHandler();
        $status=$handler->getStatusForAjaxSend();
        return $this->createAjaxResponse($status);
    }

    private function commandParser(string $command): string
    {
        $cpf='cmus-remote ';
        switch ($command){
            case 'play':
                return $cpf.'-p';
            case 'stop':
                return $cpf.'-s';
            case 'next':
                return $cpf.'-n';
            case 'prev':
                return $cpf.'-r';
            case 'pause':
                return $cpf.'-u';
            case 'volup':
                return $cpf.'-v +10001';
            case 'voldown':
                return $cpf.'-v -10001';
            default:
                return $cpf.'-Q';
        }
    }

    private function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
    }

    private function createAjaxResponse(string $content,int $statusCode=200,array $headers=[]): Response
    {
        return new Response($content,$statusCode,$headers);

    }

    private function getMusicStatusHandler(): MusicStatusHandler
    {
        return $this->container->get('app.music_status_handler');
    }

    private function getManager(): BaseManager
    {
        return $this->container->get('app.music.manager');
    }
}