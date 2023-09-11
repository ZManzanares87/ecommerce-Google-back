<?php 
use PHPUnit\Framework\TestCase;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Component\Form\Test\TypeTestCase;

class UserTypeTest extends TypeTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'email' => 'john.doe@example.com',
            'roles' => ['ROLE_USER'],
            'password' => 'password123',
            'isVerified' => true,
        ];

        $user = new User();

        $form = $this->factory->create(UserType::class, $user);
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($user, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
