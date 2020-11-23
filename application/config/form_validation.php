<?php
//Ficher dans lequel est stockées toutes nos règles de validation.
//Ces règles détermineront que tous les champs sont requis et que, en plus, l'adresse e-mail doit être valide.


defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    //Notez la clé 'site/contact' de notre tableau de configuration. 
    //C'est elle qui va dire que les règles s'appliquent à la méthode « contact » du contrôleur « site ». 
    'site/contact' => array(
        array(
            'field' => 'name',
            'label' => 'Nom',
            'rules' => 'required'
        ), 
        array(
            'field' => 'email',
            'label' => 'E-mail',
            //Une règle peut définir plusieurs exigences, comme pour le champ email.
            'rules' => array('valid_email', 'required')
        ), 
        array(
            'field' => 'emailconf',
            'label' => 'Confirmation e-mail',
            'rules' => array('valid_email', 'required', 'matches[email ]')
        ),
        array(
            'field' => 'title',
            'label' => 'Titre',
            'rules' => 'required'
        ), 
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        )
        ),

    'site/connexion' => array(
        
        array(
            'field' => 'username',
            'label' => "Nom d'utilisateur",
            'rules' => 'required'
        ), 
        array(
            'field' => 'password',
            'label' => 'Mot de passe',
            'rules' => 'required'
        )
        ),

);

?>