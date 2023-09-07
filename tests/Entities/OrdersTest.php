<?php
use App\Entity\Orders;
use App\Entity\User;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{
    public function testGetAmount(): void
    {
        $order = new Orders();
        $order->setAmount(10);

        $this->assertEquals(10, $order->getAmount());
    }

    public function testSetAmount(): void
    {
        $order = new Orders();
        $order->setAmount(10);

        $this->assertEquals(10, $order->getAmount());
    }

    public function testGetDate(): void
    {
        $order = new Orders();
        $date = new \DateTime();

        $order->setDate($date);

        $this->assertEquals($date, $order->getDate());
    }

    public function testSetDate(): void
    {
        $order = new Orders();
        $date = new \DateTime();

        $order->setDate($date);

        $this->assertEquals($date, $order->getDate());
    }

    public function testGetCost(): void
    {
        $order = new Orders();
        $order->setCost(100);

        $this->assertEquals(100, $order->getCost());
    }

    public function testSetCost(): void
    {
        $order = new Orders();
        $order->setCost(100);

        $this->assertEquals(100, $order->getCost());
    }

    public function testGetUser(): void
    {
        $order = new Orders();
        $user = new User();

        $order->setUser($user);

        $this->assertEquals($user, $order->getUser());
    }

    public function testSetUser(): void
    {
        $order = new Orders();
        $user = new User();

        $order->setUser($user);

        $this->assertEquals($user, $order->getUser());
    }

    public function testGetProduct(): void
    {
        $order = new Orders();
        $product1 = new Product();
        $product2 = new Product();

        $order->addProduct($product1);
        $order->addProduct($product2);

        $products = $order->getProduct();

        $this->assertCount(2, $products);
        $this->assertTrue($products->contains($product1));
        $this->assertTrue($products->contains($product2));
    }

    public function testAddProduct(): void
    {
        $order = new Orders();
        $product = new Product();

        $order->addProduct($product);

        $this->assertTrue($order->getProduct()->contains($product));
    }

    public function testRemoveProduct(): void
    {
        $order = new Orders();
        $product = new Product();

        $order->addProduct($product);
        $order->removeProduct($product);

        $this->assertFalse($order->getProduct()->contains($product));
    }
}