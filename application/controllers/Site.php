<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller { // on es dans le controllers

    public function index() { // on crée la méthode index pour afficher les différentes parties de la page
		$data["title"] = "Page d'accueil";// celle ci auras comme titre Page d'accueil et elle devient la valeur de title dans $data.
		// et donc dan s nos fichiers du dessous $title est $data['title].

		// la concaténation de notre page se fait avec un tableau associatif ci dessous
        $this->load->view('common/header',$data);// j'affiche avec load la vue du fichier php header, avec le contenu de $data
        $this->load->view('site/index');// idem mais pas besoin de $data pour celui ci.
		$this->load->view('common/footer',$data);

		$this->load->helper('form');
	}
	// création méthode contact.
	public function contact() {

		$this->load->helper("form");// on charge le form de codeIgniter
		$this->load->library('form_validation');// on charge la library avec les methodes définies pour valider un form avec  plus de sécurité

		$data["title"] = "Contact";// la valeur de $title est Contact;
  
		$this->load->view('common/header', $data);
			/*
			// j'ajoute une condition pour cet view (affichage) en appelant la méthode run() de la library form_validation
			// qui sert à démarrer les différentes rules (regles) grace aux méthodes pour savoir si le form 
			// seras validé ou non. dans ce cas on veut TRUE. même si ce n'est pas noté
			if($this->form_validation->run()) {
				//TRUE J'ENVOI EMAIL--
				$this->load->library('email');// c'est à ce moment que je charge la library email car condition TRUE et donc envoi de données et besoin de conf par mail pour verification
				$this->config->load('email', TRUE);// et celle que j'ai crée email.php dans config
        		$this->email->initialize($this->config->item('email'));

				$this->email->from($this->input->post('email'), $this->input->post('name'));
				//$this->email->from('your@example.com', 'Your Name'); MON EMAIL DONNER DANS INPUT AVEC MON NOM
				$this->email->to('marinelaporte@live.fr');
				//$this->email->to('someone@example.com'); MON ADRESSE MAIL QUI VA ENVOYER LE MAIL
				// OPTIONS SUP NON UTILISER
				//$this->email->cc('another@another-example.com'); UNE AUTRE PERSONNE EN CC
				//$this->email->bcc('them@their-example.com');// SI ON SOUHAITE ENVOYER CE MAIL A PLUSIEUR PERSONNE EN MEME TEMPS SANS QU'IL LE SACHENT.
				$this->email->subject($this->input->post('title'));
				//$this->email->subject('Email Test'); CE QUI AURAS NOTER DANS OBJET DU MESSAGE RECUPERER DANS INPUT TITRE
				$this->email->message($this->input->post('message'));
				//$this->email->message('Testing the email class.'); L'INTITULE DU MESSAGE SON CONTENU
					if($this->email->send()) {
						$data['result_class'] = "alert-success";
						$data['result_message'] = "Merci de nous avoir envoyé ce mail. Nous y répondrons dans les meilleurs délais.";
					} else {
						$data['result_class'] = "alert-danger";
						$data['result_message'] = "Votre message n'a pas pu être envoyé. Nous mettons tout en oeuvre pour résoudre le problème.";
						// Ne faites jamais ceci dans le "vrai monde"
						$data['result_message'] .= "<pre>\n";
						$data['result_message'] .= $this->email->print_debugger();
						$data['result_message'] .= "</pre>\n";
						$this->email->clear();
					}
				//ENSUITE J'AFFICHE LA PAGE CONTACT-RESULT
				$this->load->view('site/contact_result', $data);// TRUE tu affiche du coup le message de la page contact_result
			} else {*/
				$this->load->view('site/contact', $data);// FALSE tu ré-affiche le formulaire
			//}
		$this->load->view('common/footer', $data);

		$this->load->helper('form');
	  
	}
	// On ajoute la page a propos donc son affichage
	public function apropos() {

		$data["title"] = "À propos de moi...";
		
        $this->load->view('common/header', $data);
        $this->load->view('site/apropos', $data);
        $this->load->view('common/footer', $data);
	}
	//Pour accéder aux données de session, nous 
	//pouvons utiliser indifféremment la variable classique $_SESSION ou l'objet $this->session.
	public function session_test() {
        $this->session->count ++;
        echo"Valeur :" . $this->session->count;
	}
	//je rajoute la function connexion
	public function connexion() {
        $this->load->helper("form");
        $this->load->library('form_validation');

        $data["title"] = "Identification";

        if($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->auth_user->login( $username, $password);
            if($this->auth_user->is_connected) {
                redirect('index');
            } else {
                $data['login_error'] = "Échec de l'authentification";
            }
        }

        $this->load->view('common/header', $data);
        $this->load->view('site/connexion', $data);
        $this->load->view('common/footer', $data);
    }
	// function deconnexion
	function deconnexion() {
        $this->auth_user->logout();
        redirect('index');
    }
}

            
