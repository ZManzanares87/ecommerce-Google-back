<?php
use PHPUnit\Framework\TestCase;
use App\Form\ArtistType;
use App\Entity\Artist;
use Symfony\Component\Form\Test\TypeTestCase;

class ArtistTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name' => 'John Doe',
            'country' => 'USA',
            'discipline' => 'Painting',
            'image' => 'image.jpg',
            'product' => 'Artwork',
        ];

        $artist = new Artist();

        $form = $this->factory->create(ArtistType::class, $artist);
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($artist, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}