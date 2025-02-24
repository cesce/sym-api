<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LibraryController extends AbstractController
{

    // #[Route('/library/{max}', name: 'app_lucky_number')]
    #[Route('/library/list', name: 'library_list')]
    public function list(): Response
    {
        // $this->loadModel('Books');
        // $books = $this->Books->find('all');
        // $this->set(compact('books'));
        $response = new Response();
        $response->setContent('Library List');
        return $response;
    }
}
