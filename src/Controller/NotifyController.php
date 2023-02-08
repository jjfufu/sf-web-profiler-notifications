<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', methods: Request::METHOD_GET)]
class NotifyController extends AbstractController
{
    public function __invoke(ChatterInterface $chatter): Response
    {
        $message = (new ChatMessage('Test'))
            ->transport('firebase');

        $chatter->send($message);

        return $this->redirect('/_profiler');
    }
}
