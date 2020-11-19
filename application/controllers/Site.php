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
		$data["title"] = "Contact";
  
		$this->load->view('common/header', $data);
		$this->load->view('site/contact', $data);
		$this->load->view('common/footer', $data);

		$this->load->helper('form');
	  }
}
?>
