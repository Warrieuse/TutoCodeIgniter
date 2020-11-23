<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_status extends CI_Model {

    protected $_status;

    public function __construct() {
        $this->_status = [
            'W' => [
                  'text' => 'Brouillon',
                  'decoration' => 'warning'
              ],
              'P' => [
                  'text' => 'Publié',
                  'decoration' => 'primary'
              ],
              'D' => [
                  'text' => 'Supprimé',
                  'decoration' => 'danger'
              ]
        ];
    }

    public function __get($key) {
        $method_name = 'get_property_' . $key;
        if (method_exists($this, $method_name)) {
        return $this->$method_name();
        } else {
        return parent::__get($key);
        }
    }

    protected function get_property_label() {
        $result = [];
        foreach($this->_status as $key => $value) {
            $result[$key] = '<span class="label label-' . $value['decoration'] . '">'
                            . $value['text'] . '</span>';
        }
        return $result;
    }

    protected function get_property_text() {
        $result = [];
        foreach($this->_status as $key => $value) {
            $result[$key] = $value['text'];
        }
        return $result;
    }

    protected function get_property_codes() {
        return array_keys($this->_status);
    }
}
/*Notre modèle contiendra une propriété label qui
 retournera un tableau des textes des statuts avec
  un formatage HTML, une propriété text qui
   retournera un tableau des textes des statuts
    et une propriété codes qui retourne la liste
     des codes possibles.

Vous constaterez que les données sont « hard-codées(3)
 » dans le constructeur. Sachez que c'est une pratique
  à proscrire. Idéalement, vous créerez une table dans
   votre base de données pour contenir la liste des
    statuts. J'avoue qu'ici, j'ai fait preuve d'un peu
     de paresse. Alors, « faites ce que je dis, mais pas
      ce que je fais ». */
