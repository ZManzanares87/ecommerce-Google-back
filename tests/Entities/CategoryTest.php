<?php
use PHPUnit\Framework\TestCase;
use App\Entity\Category;
use App\Entity\Product;

class CategoryTest extends TestCase
{
    public function testGetName(): void
    {
        $category = new Category();
        $category->setName('Category Name');

        $this->assertEquals('Category Name', $category->getName());
    }

    public function testSetName(): void
    {
        $category = new Category();
        $category->setName('Category Name');

        $this->assertEquals('Category Name', $category->getName());
    }

    public function testAddProduct(): void
    {
        $category = new Category();
        $product = new Product();

        $category->addProduct($product);

        $this->assertTrue($category->getProduct()->contains($product));
        $this->assertEquals($category, $product->getCategory());
    }

    public function testRemoveProduct(): void
    {
        $category = new Category();
        $product = new Product();

        $category->addProduct($product);
        $category->removeProduct($product);

        $this->assertFalse($category->getProduct()->contains($product));
        $this->assertNull($product->getCategory());
    }
}