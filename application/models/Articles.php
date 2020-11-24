<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Model {

    protected $_list;

    public function __construct() {
        parent::__construct();
        $this->_list = [];
    }

    public function __get($key) {
        $method_name = 'get_property_' . $key;
        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        } else {
            return parent::__get($key);
        }
    }

    protected function get_property_has_items() {
        return count($this->_list) > 0;
    }

    protected function get_property_items() {
        return $this->_list;
    }

    protected function get_property_num_items() {
        return count($this->_list);
    }

    public function load($show_hidden = FALSE) {
        $this->db->select("id, title, alias, SUBSTRING_INDEX(content, ' ', 20) AS content, date, status, author ")
                 ->from('article_username')
                 -> order_by('date', 'DESC');
        if (!$show_hidden) {
            $this->db->where('status', 'P');
        }
        $this->_list = $this->db->get()-> result();
    }
}



/*J'ai utilisé la même méthode __get() que pour le modèle servant à l'authentification 
(il faudra que je pense à créer une sur-classe avec les méthodes courantes). Si vous avez
 raté les explications la concernant, je vous invite pour une séance de rattrapage à la
  section 3.4.2.

J'ai défini trois propriétés en lecture seule : items(2) qui retourne la liste des articles
 et num_items qui donne le nombre d'articles et has_items qui indique s'il y a des articles
  ou pas. J'ai également défini une méthode load() qui va charger les articles.

Vous constaterez que la méthode load() prend un paramètre $show_hidden qui est FALSE par
 défaut. Nous laissons ici la possibilité de n'afficher que les articles publiés ou également
  les brouillons et les articles supprimés. Nous pouvons mesurer ici l'intérêt du constructeur
   de requête.

La séquence « normale » d'utilisation de ce modèle est d'abord de le charger, puis d'appeler
 la méthode load(). Ensuite, les articles seront accessibles via la propriété items. Les autres
  éléments seront utiles dans les vues (croyez-moi, vous vous en rendrez vite compte). Si vous
   comptez publier votre site, il faudra faire évoluer ce modèle, notamment pour ajouter des
    fonctions de pagination.*/
