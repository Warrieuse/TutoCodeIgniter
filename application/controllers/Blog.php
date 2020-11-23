<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    function index() {
        $this->load->helper('date');
        $this->load->model('articles');
        $this->load->model('article_status');
        $this->articles->load($this->auth_user->is_connected);

        $data['title'] = "Blog";

        $this->load->view('common/header', $data);
        $this->load->view('blog/index', $data);
        $this->load->view('common/footer', $data);
    }
}
?>

