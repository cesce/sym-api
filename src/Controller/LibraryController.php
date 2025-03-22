<?php
// src/Controller/LibraryController.php
namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Service\Mock\MockLibraryService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// #[Route('/library', name: 'library')] // This will create this route prefix for all the controllers
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
    #[Route('/books', name: 'books_get', methods: ['GET'])]
    // public function list(): Response
    public function list(Request $request, BookRepository $bookRepository): JsonResponse
    {

        // $this->set(compact('books'));

        // Returns a Response object with a String
        // $response = new Response();
        // $response->setContent(<div>'Library List'</div>);
        // return $response;

        // return $this->json([
        //   "success" => true,
        //   "data" => $this->libraryService->getBooks()
        // ]);

        // $this->logger->info('Listing books');
        // dump($response);
        // return $this->success($this->libraryService->getBooks());
        
        $books = $bookRepository->findAll();
        $booksAsArray = [];
        foreach ($books as $book) {
          $booksAsArray[] = [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'image' => $book->getImage()
          ];
        };
        return $this->success($booksAsArray);
    }

    // This method will accept form data, using $request->get('title', null)
    // #[Route('/book', name: 'create_book', methods: ['POST'])]
    #[Route('/book', name: 'create_book', methods: ['POST'])]
    public function createBook(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $this->logger->info('Creating book');
        $book = new Book();
        $title = $request->get('title', null);
        if (empty($title)) {
            return $this->error('Title is required', Response::HTTP_BAD_REQUEST);
        }
        $book->setTitle($title);
        $book->setImage($request->get('image', null));
        // Manage the book creation not insert into the database
        $em->persist($book);
        // Execute the query and is sent to the database
        $em->flush();
        return $this->success($book);
    }

    #[Route('/books', name: 'create_a_book', methods: ['POST'])]
    public function createABook(Request $request, EntityManagerInterface $em) : JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        // Validate the JSON-decoded body to ensure required fields exist
        if (!isset($body['title']) || !isset($body['image'])) {
            return $this->error('Invalid request payload', Response::HTTP_BAD_REQUEST);
        }

        $book = new Book();
        $book->setTitle($body['title']);
        $book->setImage($body['image']);
        $em->persist($book);
        $em->flush();
        return $this->success($book);
    }
}
