<?php

namespace App\Controller;

use App\Form\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class EmailController extends AbstractController
{
    #[Route('/email', name: 'app_email')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form=$this->createForm(EmailType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $name=$form->get('name')->getData();
            $id=$form->get('id')->getData();
            $number=$form->get('number')->getData();
            $legal=$form->get('legal')->getData();


            $email=(new Email())
                ->from('example@live.com')
                ->to('example@gmail.com')
                ->subject('1')
                ->addCc('example@outlook.com')
                ->text("o nome é $name the id is $id and the number is $number");

            $email2=(new Email())
                ->from('example@live.com')
                ->to('example@outlook.com')
                ->subject('2')
                ->addCc('example@gmail.com')
                ->text("Hello I hope this email finds you well
                  i need a new something with the name: $name 
                  the id is: $id and the number in our service is: $number");
            try{
                $mailer->send($email);
                $mailer->send($email2);
                if($legal){
                    $email3=(new Email())
                        ->from('example@live.com')
                        ->to('example@outlook.com')
                        ->subject('3')
                        ->addCc('example@gmail.com')
                        ->text("$name $id $number");
                    $mailer->send($email3);
                }
                return new Response('Email sent successfully!');
            }catch(TransportExceptionInterface $e){
                return new Response($e->getMessage());
            }
        }
        return $this->render('email/index.html.twig', [
            'form' => $form,
        ]);
    }
}
