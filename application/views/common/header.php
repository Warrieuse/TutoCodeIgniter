<?php	require_once 'application/helpers/MY_html_helper.php';?>
<!DOCTYPE html>
<html>
  <head>
<!--     <meta charset="UTF-8">	--><?= meta("UTF-8", "", 'charset'); // affiche : <meta charset ="UTF-8" /> ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  

  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                  data-target="#main_nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= site_url('index'); ?>">Marine LAPORTE</a>
        </div>
				<div class="collapse navbar-collapse" id="main_nav">
          <ul class="nav navbar-nav">
            <li><?= anchor('index', "Accueil"); ?></li>
            <li><?= anchor('blog/index', "Blog"); ?></li>
            <li><?= anchor('apropos', "À propos"); ?></li>
              <?php if ($this->auth_user->is_connected) : // si admin connecté alors on affiche un panneau de controle?> 
            <li>
              <?= anchor('panneau_de_controle/index', "Panneau de contrôle"); ?>
            </li>
            <?php endif; ?>
            <li><?= anchor('contact', "Contact"); ?></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($this->auth_user->is_connected) : ?>
              <li><?= anchor('deconnexion', "Déconnexion"); ?></li>
            <?php else: ?>
              <li><?= anchor('connexion', "Connexion"); ?></li>
            <?php endif; ?>
          </ul>
          <?php if($this->auth_user->is_connected) : ?>
            <p class="navbar-text navbar-right">|</p>
            <p class="navbar-text navbar-right">Bienvenue <strong><?= $this->auth_user->username; ?></strong></p>
          <?php endif; ?>
        </div>
		  </div>
    </nav>
