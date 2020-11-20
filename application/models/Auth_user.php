<?php
//L'idée de base est de permettre à un utilisateur de se connecter et de se déconnecter, 
//et de garder cette information dans une session.
defined('BASEPATH') OR exit('No direct script access allowed');

/*Tout d'abord, notre modèle va étendre la classe CI_Model.
Cela va nous permettre d'utiliser les librairies, les paramètres de configurations… déjà chargés.*/
class Auth_user extends CI_Model {

    protected $_username;
    protected $_id;
/*Passons maintenant à la méthode __construct(). Je suppose que vous l'aurez deviné, il s'agit du constructeur.
Nous allons dans un premier temps faire appel au constructeur de CI_Model. Ensuite, nous allons charger les
informations depuis la session en appelant la méthode load_from_session(). Si des informations existent,
elles seront chargées. Attention, si vous n'appelez pas explicitement le constructeur de la classe parente,
il ne sera pas exécuté et vous vous exposez à de sérieux problèmes. Faites-moi confiance,
je l'ai (involontairement) testé.*/
    public function __construct() {
        parent::__construct();
        $this->load_from_session();
    }
/*On définie une méthode _get : qui return la valeur de la methode de la propriété si elle exist
si elle n'existe pas et bien c'est la methode get qui est utilisé  */
    public function __get( $key) {
        $method_name = 'get_property_' . $key;
        if (method_exists($this, $method_name)) {
            return $this->$method_name();
        } else {
            return parent::__get( $key);
        }
    }

    protected function clear_data() {
        $this->_id = NULL;
        $this->_username = NULL;
    }

    protected function clear_session() {
        $this->session->auth_user = NULL;
    }

    protected function get_property_id() {
        return $this->_id;
    }

    protected function get_property_is_connected() {
        return $this->_id !== NULL;
    }

    protected function get_property_username() {
        return $this->_username;
    }

    protected function load_from_session() {
        if ($this->session->auth_user) {
            $this->_id = $this->session->auth_user['id'];
            $this->_username = $this->session->auth_user['username'];
        } else {
            $this->clear_data();
        }
    }

    protected function load_user( $username) {
        return $this->db
                    ->select('id, username, password')
                    ->from('login')
                    ->where('username', $username)
                    ->where('status', 'A')
                    ->get()
                    ->first_row();
    }

    public function login( $username, $password) {
        $user = $this->load_user( $username);
        if (( $user !== NULL) && password_verify($password, $user->password)) {
            $this->_id = $user->id;
            $this->_username = $user->username;
            $this->save_session();
        } else {
            $this->logout();
        }
    }

    public function logout() {
        $this->clear_data();
        $this->clear_session();
    }

    protected function save_session() {
        $this->session->auth_user = [
            'id' => $this->_id,
            'username' => $this->_username
        ];
    }
}
