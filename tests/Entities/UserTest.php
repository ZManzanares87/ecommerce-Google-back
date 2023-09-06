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


}