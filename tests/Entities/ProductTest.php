<?php

namespace App\Tests\Entities;
use App\Entity\Category;
use App\Entity\Product;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
 {

public function testSetName(): void
{
    $product = new Product();
    $name = 'Product Name';
    
    $product->setName($name);
    
    $this->assertEquals($name, $product->getName());
}

public function testSetPrice(): void
{
    $product = new Product();
    $price = 10;
    
    $product->setPrice($price);
    
    $this->assertEquals($price, $product->getPrice());
}


public function testSetImage(): void
{
    $product = new Product();
    $image = 'product.jpg';
    
    $product->setImage($image);
    
    $this->assertEquals($image, $product->getImage());
}

public function testSetStock(): void
{
    $product = new Product();
    $stock = 5;
    
    $product->setStock($stock);
    
    $this->assertEquals($stock, $product->getStock());
}

public function testSetCategory(): void
{
    $product = new Product();
    $category = new Category();
    
    $product->setCategory($category);
    
    $this->assertEquals($category, $product->getCategory());
}
 }