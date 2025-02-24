<?php

namespace App\Controller;

use App\Service\Mock\MockLibraryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// class LibraryController extends AbstractController
class LibraryController extends ApiController
{

    private MockLibraryService $libraryService;

    public function __construct(MockLibraryService $libraryService)
    {
        $this->libraryService = $libraryService;
    }

    // With the @Route annotation, we can define the route for the controller method
    // @Route("/library/list", name="library_list")
    
    // #[Route('/library/{max}', name: 'app_lucky_number')]
    #[Route('/library/list', name: 'library_list')]
    // public function list(): Response
    public function list(Response $response): JsonResponse
    {

        // $this->set(compact('books'));

        // Returns a Response object with a String
        // $response = new Response();
        // $response->setContent('Library List');
        // return $response;

        // return $this->json([
        //   "success" => true,
        //   "data" => $this->libraryService->getBooks()
        // ]);

        return $this->success($this->libraryService->getBooks());
    }
}
