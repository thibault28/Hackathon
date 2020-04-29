<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class ContactController extends AbstractController
{
    public function contact()
    {
        $error = null;

        if (isset($_POST["contact"])) {
            $email = trim($_POST["email"]);
            $name = trim($_POST["name"]);
            $message = trim($_POST["message"]);

            $error = $this->contactFormError($email, $name, $message);

            // Create the Mailer using your created Transport
            $mailer = $this->mailerTransport();
            // Create a message
            $message = (new Swift_Message("$name vous a posé(e) une question"))
                ->setFrom([MAILER_USERNAME => 'Le monde depuis le canapé'])
                ->setTo(MAILER_USERNAME)
                ->setContentType("text/html")
                ->setBody(
                    $this->twig->render(
                        //The content of the mail is in twig page
                        'Email/emailContact.html.twig',
                        [
                            "email" => $email,
                            "name" => $name,
                            "message" => $message,
                        ]
                    ),
                    'text/html'
                );

            if ($error == null) {
                // Send the message
                $mailer->send($message);

                //redirect at the same page
                header('Location:/contact/contact');
            }
        }


        return $this->twig->render('Contact/contact.html.twig', [
            "error" => $error,
        ]);
    }

    private function mailerTransport()
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(MAILER_HOST, MAILER_PORT, MAILER_ENCRYPTION))
            ->setUsername(MAILER_USERNAME)
            ->setPassword(MAILER_PASSWORD);

        //Create option of the transport
        $transport->setStreamOptions([
            'ssl' => ['allow_self_signed' => true, 'verify_peer' => false, 'verify_peer_name' => false]
        ]);

        // Create the Mailer using your created Transport
        return new Swift_Mailer($transport);
    }


    private function contactFormError($email, $name, $message)
    {
        $error = null;
        if (!empty($email) && !empty($name) && !empty($message)) {
        } else {
            $error = "Tous les champs doivent être remplis";
        }
        return $error;
    }
}
