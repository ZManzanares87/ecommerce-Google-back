<?php

namespace App\Controller;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }
    #[Route('/token/register', name: 'register', methods:'POST')]
    public function register(Request $request, ValidatorInterface $validator, ManagerRegistry $doctrine, MailerInterface $mailer): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
        $user->setName($data['name']);
        $user->setLastName($data['last_name']);

        $em = $doctrine->getManager();
        $em->persist($user);
        $em->flush();

        ##ENVIAR EMAIL 
        $email = (new TemplatedEmail())
        ->from(new Address('juananprog@gmail.com', 'Google 3D Aesthetics'))
        ->to($user->getEmail())
        ->subject('Gracias por registrarte')
        ->htmlTemplate('emails/registration.html.twig')
        ->context([
            'user' => $user,
        ]);

    $mailer->send($email);

        return new JsonResponse(['success' => true]);


    }
    #[Route('/register', name: 'app_register')]
    public function registerback(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('juananprog@gmail.com', 'gmailjuananprogbot'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    
    // #[Route('front/register', name: 'api_register')]
    // public function apiRegister(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    // {
    //     $user = new User();

    //     $email = $request->query->get('username');
    //     $password = $request->query->get('password');

    //     // if(!$email) {
    //     //     $password = $request->attributes->get('password');
    //     // } 


    //     // sacar user y password del request
    //     // ...

    //     // encode the plain password
    //     $user->setPassword(
    //         $userPasswordHasher->hashPassword(
    //             $user,
    //             $password
    //         )
    //     );

    //     $user->setEmail($email);

    //     $entityManager->persist($user);
    //     $entityManager->flush();

    //     // generate a signed url and email it to the user
    //     $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
    //         (new TemplatedEmail())
    //             ->from(new Address('info@coderf5.es', 'Acme Mail Bot'))
    //             ->to($user->getEmail())
    //             ->subject('Please Confirm your Email')
    //             ->htmlTemplate('registration/confirmation_email.html.twig')
    //         );
    //     // do anything else you need here, like send an email

    //     dump('ok');die;

    //     return $this->redirectToRoute('home');
    // }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
}
