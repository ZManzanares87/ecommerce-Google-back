<?php
use PHPUnit\Framework\TestCase;
use App\Entity\Orders;
use App\Entity\User;


class UserTest extends TestCase
{
    public function testGetEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');

        $this->assertEquals('test@example.com', $user->getEmail());
    }

    public function testSetEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');

        $this->assertEquals('test@example.com', $user->getEmail());
    }

    public function testGetRoles(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);

        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }

    public function testSetRoles(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);

        $this->assertEquals(['ROLE_ADMIN', 'ROLE_USER'], $user->getRoles());
    }

    public function testGetPassword(): void
    {
        $user = new User();
        $user->setPassword('password');

        $this->assertEquals('password', $user->getPassword());
    }

    public function testSetPassword(): void
    {
        $user = new User();
        $user->setPassword('password');

        $this->assertEquals('password', $user->getPassword());
    }

    public function testGetUserIdentifier(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');

        $this->assertEquals('test@example.com', $user->getUserIdentifier());
    }

    public function testGetSalt(): void
    {
        $user = new User();

        $this->assertNull($user->getSalt());
    }

    public function testIsVerified(): void
    {
        $user = new User();
        $user->setIsVerified(true);

        $this->assertTrue($user->isVerified());
    }

    public function testSetIsVerified(): void
    {
        $user = new User();
        $user->setIsVerified(true);

        $this->assertTrue($user->isVerified());
    }

    public function testGetName(): void
    {
        $user = new User();
        $user->setName('John');

        $this->assertEquals('John', $user->getName());
    }

    public function testSetName(): void
    {
        $user = new User();
        $user->setName('John');

        $this->assertEquals('John', $user->getName());
    }

    public function testGetLastName(): void
    {
        $user = new User();
        $user->setLastName('Doe');

        $this->assertEquals('Doe', $user->getLastName());
    }

    public function testSetLastName(): void
    {
        $user = new User();
        $user->setLastName('Doe');

        $this->assertEquals('Doe', $user->getLastName());
    }

    public function testGetPhone(): void
    {
        $user = new User();
        $user->setPhone('123456789');

        $this->assertEquals('123456789', $user->getPhone());
    }

    public function testSetPhone(): void
    {
        $user = new User();
        $user->setPhone('123456789');

        $this->assertEquals('123456789', $user->getPhone());
    }

    public function testIsLikes(): void
    {
        $user = new User();
        $user->setLikes(true);

        $this->assertTrue($user->isLikes());
    }

    public function testSetLikes(): void
    {
        $user = new User();
        $user->setLikes(true);

        $this->assertTrue($user->isLikes());
    }

    public function testGetOrders(): void
    {
        $user = new User();
        $order1 = new Orders();
        $order2 = new Orders();

        $user->addOrder($order1);
        $user->addOrder($order2);

        $orders = $user->getOrders();

        $this->assertCount(2, $orders);
        $this->assertTrue($orders->contains($order1));
        $this->assertTrue($orders->contains($order2));
    }

    public function testAddOrder(): void
    {
        $user = new User();
        $order = new Orders();

        $user->addOrder($order);

        $this->assertTrue($user->getOrders()->contains($order));
        $this->assertEquals($user, $order->getUser());
    }

    public function testRemoveOrder(): void
    {
        $user = new User();
        $order = new Orders();

        $user->addOrder($order);
        $user->removeOrder($order);

        $this->assertFalse($user->getOrders()->contains($order));
        $this->assertNull($order->getUser());
    }
}