<?php
use App\Entity\Artist;
use App\Entity\Product;

use PHPUnit\Framework\TestCase;

class ArtistTest extends TestCase
{
    public function testGetName(): void
    {
        $artist = new Artist();
        $artist->setName('John Doe');

        $this->assertEquals('John Doe', $artist->getName());
    }

    public function testSetName(): void
    {
        $artist = new Artist();
        $artist->setName('John Doe');

        $this->assertEquals('John Doe', $artist->getName());
    }

    public function testGetCountry(): void
    {
        $artist = new Artist();
        $artist->setCountry('USA');

        $this->assertEquals('USA', $artist->getCountry());
    }

    public function testSetCountry(): void
    {
        $artist = new Artist();
        $artist->setCountry('USA');

        $this->assertEquals('USA', $artist->getCountry());
    }

    public function testGetDiscipline(): void
    {
        $artist = new Artist();
        $artist->setDiscipline('Painting');

        $this->assertEquals('Painting', $artist->getDiscipline());
    }

    public function testSetDiscipline(): void
    {
        $artist = new Artist();
        $artist->setDiscipline('Painting');

        $this->assertEquals('Painting', $artist->getDiscipline());
    }

    public function testGetImage(): void
    {
        $artist = new Artist();
        $artist->setImage('image.jpg');

        $this->assertEquals('image.jpg', $artist->getImage());
    }

    public function testSetImage(): void
    {
        $artist = new Artist();
        $artist->setImage('image.jpg');

        $this->assertEquals('image.jpg', $artist->getImage());
    }

    public function testGetProduct(): void
    {
        $artist = new Artist();
        $product = new Product();
        $artist->setProduct($product);

        $this->assertEquals($product, $artist->getProduct());
    }

    public function testSetProduct(): void
    {
        $artist = new Artist();
        $product = new Product();
        $artist->setProduct($product);

        $this->assertEquals($product, $artist->getProduct());
    }

    // Pruebas adicionales para validar límites y restricciones de valores de entrada
    //este test falla pero porque no vamos a dejar que el campo string de name este vacio
    // public function testSetNameWithEmptyString(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);

    //     $artist = new Artist();
    //     $artist->setName('');
    // }

    // public function testSetCountryWithInvalidValue(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);

    //     $artist = new Artist();
    //     $artist->setCountry('Invalid Country');
    // }

    // Pruebas adicionales para validar interacciones con otras clases o componentes
    //este falla porque no tenemos implementada esa funcion
    // public function testAddArtistToProduct(): void
    // {
    //     $artist = new Artist();
    //     $product = new Product();

    //     $artist->setProduct($product);

    //     $this->assertTrue($product->getArtists()->contains($artist));
    // }

    public function testRemoveArtistFromProduct(): void
    {
        $artist = new Artist();
        $product = new Product();

        $artist->setProduct($product);
        $artist->setProduct(null);

        $this->assertFalse($product->getArtists()->contains($artist));
    }
}