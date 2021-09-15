<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;

require '../public/config.php';

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/**
 * Class UserController
 *
 * @package Src
 */
class UserController extends Controller
{
    /**
     * Méthode pour vérifier que les champs du formulaire ne sont pas vides
     * 
     * @param array $data
     * 
     * @return array $data
     */
    public function isValid($data = [])
    {
        if (isset($data['name'], $data['firstname'], $data['email']) && ($data['name'] != '') && ($data['firstname'] != '') && ($data['email'] != '')) {
            return $data;
        }

        return false;
    }

    /**
     * Méthode pour créer un compte utilisateur
     * 
     * @return void
     */
    public function viewAccount()
    {
        $userModel = new UserManager();

        if ($user = $this->isValid($_POST)) {

            // On lance la méthode de création de l'utilisateur
            $user = $userModel->create(htmlspecialchars($user['name']), htmlspecialchars($user['firstname']), htmlspecialchars($user['email']));
            $token = base64_encode($_POST['email']);
            $url = 'http://localhost:8888/blog/creation-mot-de-passe/'.$token;

            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername(YOUR_GMAIL_MAIL)
                ->setPassword(YOUR_GMAIL_PASSWORD);

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Création de votre compte'))
                ->setFrom([YOUR_GMAIL_MAIL => 'OpenclassroomsBlog'])
                ->setTo([$_POST['email']])
                ->setBody('Voici le lien de création de votre mot de passe : '.$url);

            $result = $mailer->send($message);

            // Si le mail est envoyé
            if (mail($_POST['email'], 'Création de votre compte', 'Voici le lien de création de votre mot de passe : '.$url)) {
                // On affiche le message
                $_SESSION['message-valid'] = "Un lien vers le formulaire de création de mot de passe vient de vous être envoyer par mail.";
            }
        }
        // On affiche le formulaire de création
        include '../views/create-account.php';
    }

    /**
     * Méthode pour se connecter à son compte utilisateur
     * 
     * @return void
     */
    public function viewLogin()
    {

        // On génère un token unique
        if (!isset($_SESSION['token'])) {
            $token = md5(uniqid(rand(), true));

            // On le stock en session
            $_SESSION['token'] = $token;
        }

        $userModel = new UserManager();

        if (isset($_POST['email'], $_POST['password'], $_POST['token']) && ($_POST['email'] != '' && $_POST['password'] !='')) {

            // Si le jeton de la session correspond à celui du formulaire
            if ($_POST['token'] == $_SESSION['token']) {

                // Si l'adresse mail de l'utilisateur est enregistrée
                if ($user = $userModel->connexion($_POST['email'])) {
                    $password = $user->getPassword();

                    // Si le mot de passe saisie par l'utilisateur est enregistré
                    if (password_verify($_POST['password'], $password)) {

                        // On enregistre les variables de la table user dans $_SESSION
                        $_SESSION['user']['name'] = $user->getName();
                        $_SESSION['user']['firstname'] = $user->getFirstName();
                        $_SESSION['user']['email'] = $user->getEmail();
                        $_SESSION['user']['creationDate'] = $user->getCreationDate();
                        $_SESSION['user']['iduser'] = $user->getId();
                        $_SESSION['user']['role'] = $user->getRole();
                        // On vide le token de $_SESSION
                        unset($_SESSION['token']);

                        // Si l'utilisateur est un administrateur
                        if ($user->getRole() == 3) {

                            // On le redirige sur le tableau de bord du blog
                            header('Location: /blog/admin/tableau-de-bord/articles');
                        } else {
                            // On redirige l'utilisateur sur son profil
                            header('Location: /blog/admin/mon-compte');
                        }
                    }
                    // Sinon on affiche le message d'erreur
                    else {
                        $_SESSION['message'] = "Oops ! Le mot de passe n'est pas correcte.";
                    }
                }
            }
        }

        include '../views/login.php';
    }

    /**
     * Méthode pour envoyer le lien de réinitialisation du mot de passe par mail
     * 
     * @link https://swiftmailer.symfony.com/docs/sending.html
     * 
     * @return void
     */
    public function viewRequestPassword()
    {
        $userModel = new UserManager();

        if (isset($_POST['email']) && ($_POST['email'] != '')) {

            // Si l'adresse mail de l'utilisateur est enregistrée
            if ($user = $userModel->connexion($_POST['email'])) {

                // On crée un token avec l'adresse mail de l'utilisateur
                $token = base64_encode($_POST['email']);
                $url = 'http://localhost:8888/blog/nouveau-mot-de-passe/'.$token;

                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                    ->setUsername(YOUR_GMAIL_MAIL)
                    ->setPassword(YOUR_GMAIL_PASSWORD);

                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message('Réinitialitisation de votre mot de passe'))
                    ->setFrom([YOUR_GMAIL_MAIL => 'OpenclassroomsBlog'])
                    ->setTo([$_POST['email']])
                    ->setBody('Voici le lien de réinitialisation de votre mot de passe : '.$url);

                $result = $mailer->send($message);

                // Si le mail est envoyé
                if (mail($_POST['email'], 'Réinitilatisation de votre mot de passe', 'Voici le lien de réinitialisation de votre mot de passe :' .$url)) {
                    //On affiche le message
                    $_SESSION['message-valid'] = "Un lien de réinitilisation vient de vous être envoyer par mail.";
                }
            }
            // Sinon on affiche le message
            else {
                $_SESSION['message-error'] = "Oops ! Aucune adresse mail est enregistrée.";
            }
        }

        include '../views/form-forgot-password.php';
    }

    /**
     * Méthode pour enregistrer le mot de passe de l'utilisateur
     * 
     * @param string $params
     * 
     * @return void
     */
    public function viewCreatePassword($params)
    {
        $userModel = new UserManager();

        // On vérifie que les champs sont remplis
        if (isset($_POST['password'], $_POST['validpassword']) && ($_POST['password'] != '' && $_POST['validpassword'] !='')) {

            // On vérifie que les champs password et validpassword sont identiques
            if ($_POST['password'] === $_POST['validpassword']) {
                // On lance la méthode
                $user = $userModel->createPassword(password_hash($_POST['password'], PASSWORD_DEFAULT), base64_decode($params['token']));

                // On affiche un message de succès
                $_SESSION['message-valid'] = "Votre compte est bien enregistré ! Vous pouvez dès à présent vous <a href='/blog/connexion'>connecter.</a>";

            } else {
                // Sinon on affiche le message d'erreur
                $_SESSION['message'] = "Oops ! Le nouveau mot de passe et la confirmation du mot de passe ne sont pas identiques";
            }
        }
        include '../views/form-create-password.php';
    }

    /**
     * Méthode pour réinitiliser le mot de passe de l'utilisateur
     * 
     * @param string $params
     * 
     * @return void
     */
    public function viewUpdatePassword($params)
    {
        $userModel = new UserManager();

        // On vérifie que les champs sont remplis
        if (isset($_POST['password'], $_POST['validpassword']) && ($_POST['password'] != '' && $_POST['validpassword'] !='')) {

            // On vérifie que les champs password et validpassword sont identiques
            if ($_POST['password'] === $_POST['validpassword']) {
                // On lance la méthode
                $user = $userModel->updatePassword(password_hash($_POST['password'], PASSWORD_DEFAULT), base64_decode($params['token']));

                // On redirige l'utilisateur sur le formulaire de connexion
                header('Location: /blog/connexion');
            } else {
                // Sinon on affiche le message d'erreur
                $_SESSION['message'] = "Oops ! Le nouveau mot de passe et la confirmation du mot de passe ne sont pas identiques";
            }
        }
        include '../views/form-password.php';
    }

    /**
     * Méthode pour envoyer le formulaire de contact par mail
     * 
     * @return void
     */
    public function viewContact()
    {
        $userModel = new UserManager();

        // On vérifie que les champs sont remplis
        if (isset($_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['message']) && ($_POST['name'] != '' && $_POST['firstname'] !='' && $_POST['email'] != '' && $_POST['message'] != '')) {

            // On lance la méthode qui envoie le formulaire de contact
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername(YOUR_GMAIL_MAIL)
                ->setPassword(YOUR_GMAIL_PASSWORD);

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Nouveau formulaire de contact'))
                ->setFrom([YOUR_GMAIL_MAIL => 'OpenclassroomsBlog'])
                ->setTo(YOUR_GMAIL_MAIL)
                ->setBody('Nom : ' .$_POST['name']. '<br/>Prénom : ' .$_POST['firstname']. '<br/>Email : ' .$_POST['email']. '<br/>Message : ' .$_POST['message'], 'text/html');

            $result = $mailer->send($message);
        }
        include '../views/contact.php';
    }
}
