<?php

namespace App\Controller;

use App\Service\Mock\MockLibraryService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// class LibraryController extends AbstractController
class LibraryController extends ApiController
{

    private MockLibraryService $libraryService;
    private $logger;

    public function __construct(MockLibraryService $libraryService, LoggerInterface $logger)
    {
        $this->libraryService = $libraryService;
        $this->logger = $logger;
    }

    // With the @Route annotation, we can define the route for the controller method
    // @Route("/library/list", name="library_list")
    
    // #[Route('/library/{max}', name: 'app_lucky_number')]
    #[Route('/library/list', name: 'library_list')]
    // public function list(): Response
    public function list(): JsonResponse
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

        $this->logger->info('Listing books');
        return $this->success($this->libraryService->getBooks());
    }
}
