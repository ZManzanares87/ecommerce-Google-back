<?php
use PHPUnit\Framework\TestCase;
use App\Form\ProductType;
use App\Entity\Product;
use Symfony\Component\Form\Test\TypeTestCase;

class ProductTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name' => 'Product Name',
            'price' => 9.99,
            'image' => 'product_image.jpg',
            'stock' => 10,
            'qr' => 'product_qr_code',
        ];

        $product = new Product();

        $form = $this->factory->create(ProductType::class, $product);
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($product, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}