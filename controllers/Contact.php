<?php

class Contact{

    function __construct(){
        if($this->isPost()){
            $this->handlePost($_POST);
        }
    }
    public function isPost(){
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }
    public function handlePost($data)
    {
        $errors = [];
        if (strlen($data['name']) === 0) {
            $errors['name'] = "Veuillez indiquer votre nom";
        }
        if (strlen($data['email']) === 0) {
            $errors['email'] = "Veuillez indiquer votre mail";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "L\'adresse email n\' pas valide";
        }
        if (strlen($data['subject']) === 0) {
            $errors['subject'] = "Veuillez indiquer votre sujet";
        }
        if (strlen($data['message']) === 0) {
            $errors['message'] = "Veuillez indiquer votre message";
        }
        if (!$errors) {
            $name = htmlspecialchars(trim($data['name']));
            $email = htmlspecialchars(trim($data['email']));
            $subject = htmlspecialchars(trim($data['subject']));
            $content = nl2br(htmlspecialchars(trim($data['message'])));
            require('./models/FormContact.php');
            $message = new Message($name, $email, $subject, $content);
        }
    }
}
