<?php
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Form\FormInterface;
use App\Controller\CategoryController;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class CategoryControllerTest extends TestCase
{
    private $controller;
    private $categoryRepository;
    private $entityManager;
    private $twig;
    private $router;

    protected function setUp(): void
    {
        $this->categoryRepository = $this->createMock(CategoryRepository::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->twig = $this->createMock(Environment::class);
        $this->router = $this->createMock(RouterInterface::class);

        $this->controller = new CategoryController(
            $this->categoryRepository,
            $this->entityManager,
            $this->twig,
            $this->router
        );
    }

    // public function testIndex(): void
    // {
    //     $categories = [new Category(), new Category()];

    //     $this->categoryRepository->expects($this->once())
    //         ->method('findAll')
    //         ->willReturn($categories);

    //     $this->twig->expects($this->once())
    //         ->method('render')
    //         ->with('category/index.html.twig', ['categories' => $categories])
    //         ->willReturn('Rendered template');

    //     $response = $this->controller->index();

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

    // public function testNew(): void
    // {
    //     $request = $this->createMock(Request::class);
    //     $form = $this->createMock(FormInterface::class);
    //     $category = new Category();

      
    //     $this->twig->expects($this->once())
    //         ->method('renderForm')
    //         ->with('category/new.html.twig', ['category' => $category, 'form' => $form])
    //         ->willReturn('Rendered template');

    //     $response = $this->controller->new($request);

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

    // public function testNewWithInvalidForm(): void
    // {
    //     $request = $this->createMock(Request::class);
    //     $form = $this->createMock(FormInterface::class);
    //     $category = new Category();

       

        

    //     $this->twig->expects($this->once())
    //         ->method('renderForm')
    //         ->with('category/new.html.twig', ['category' => $category, 'form' => $form])
    //         ->willReturn('Rendered template');

    //     $response = $this->controller->new($request);

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

    // public function testNewWithValidForm(): void
    // {
    //     $request = $this->createMock(Request::class);
    //     $form = $this->createMock(FormInterface::class);
    //     $category = new Category();

        
    //     $this->entityManager->expects($this->once())
    //         ->method('persist')
    //         ->with($category);

    //     $this->entityManager->expects($this->once())
    //         ->method('flush');

    //     $this->router->expects($this->once())
    //         ->method('generate')
    //         ->with('app_category_index')
    //         ->willReturn('/category');

    //     $response = $this->controller->new($request);

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('/category', $response->headers->get('Location'));
    //     $this->assertEquals(Response::HTTP_SEE_OTHER, $response->getStatusCode());
    // }

    // public function testShow(): void
    // {
    //     $category = new Category();

    //     $this->twig->expects($this->once())
    //         ->method('render')
    //         ->with('category/show.html.twig', ['category' => $category])
    //         ->willReturn('Rendered template');

    //     $response = $this->controller->show($category);

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

    
}