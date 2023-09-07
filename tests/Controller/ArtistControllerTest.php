<?php
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Controller\ArtistController;
use App\Entity\Artist;
use App\Form\ArtistType;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class ArtistControllerTest extends TestCase
{
    private $controller;
    private $artistRepository;
    private $entityManager;
    private $twig;
    private $router;

    protected function setUp(): void
    {
        $this->artistRepository = $this->createMock(ArtistRepository::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->twig = $this->createMock(Environment::class);
        $this->router = $this->createMock(RouterInterface::class);

        $this->controller = new ArtistController(
            $this->artistRepository,
            $this->entityManager,
            $this->twig,
            $this->router
        );
    }

    // public function testIndex(): void
    // {
    //     // Crear objetos simulados
    //     $request = $this->createMock(Request::class);
    //     $response = new Response();
    //     $artists = [new Artist(), new Artist()];
    
    //     // Configurar comportamiento esperado de los objetos simulados
    //     $this->artistRepository->expects($this->once())
    //         ->method('findAll')
    //         ->willReturn($artists);
    
    //     $this->twig->expects($this->once())
    //         ->method('render')
    //         ->with('artist/index.html.twig', ['artists' => $artists])
    //         ->willReturn('Rendered template');
    
    //     // Llamar al método index() del controlador con el objeto Request simulado
    //     $response = $this->controller->index($request);
    
    //     // Verificar los resultados
    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

  
   

    // public function testShow(): void
    // {
    //     $artist = new Artist();
        
    //     $this->twig->expects($this->once())
    //         ->method('render')
    //         ->with('artist/show.html.twig', ['artist' => $artist])
    //         ->willReturn('Rendered template');

    //     $response = $this->controller->show($artist);

    //     $this->assertInstanceOf(Response::class, $response);
    //     $this->assertEquals('Rendered template', $response->getContent());
    // }

}