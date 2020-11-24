<div class="container">

  <div class="row">
    <div class="col-md-12">
      <?= heading($title); ?>
      <hr/>
    </div>
  </div>

  <div class="row">
  <div class="col-md-10">
    <ul class="nav nav-pills nav-justified">
      <?php if ($this->auth_user->is_connected) : ?>
        <li role="presentation"><?= anchor('blog/edition', "Nouvel article"); ?></li>
      <?php endif; ?>
    </ul>
  </div>
  <div class="col-md-2">
    <p class="text-right">Nombre d'articles : <?= $this->articles->num_items; ?></p>
  </div>
</div>

  <div class="row">
    <?php if ($this->articles->has_items) : ?>
      <?php
      foreach($this->articles->items as $article) {
        $this->load->view('blog/article_resume', $article);
      }
      ?>
    <?php else: ?>
      <div class="col-md-12">
        <p class="alert alert-warning" role="alert">
          Il n'y a encore aucun article.
        </p>
      </div>
    <?php endif; ?>
  </div>
</div>
<!--Nous allons afficher le titre de la page et ensuite le
 nombre d'articles grâce à la propriété num_items de notre
  modèle (je vous avais dit que ça servirait). Ensuite, nous
   faisons un test pour savoir s'il y a des articles ou pas
    grâce à la propriété has_items. S'il n'y a pas d'articles,
     un message d'avertissement sera affiché.

S'il y a des articles, nous exécuterons une boucle pour les afficher.
Alors ici, j'ai inclus un petit concept intéressant à placer dans un
entretien d'embauche : la vue partielle. Certaines personnes en font
 des pataquès autour de ce concept, mais en réalité, c'est très simple
  : il s'agit d'une vue appelée à partir d'une autre vue. Une même vue
   partielle peut être appelée à partir de différentes autres vues pour
    avoir un bout de code identique sur plusieurs pages. Cela évite la
     redondance. Alors si vous obtenez un job grâce à ça, n'oubliez pas
      ma commission.    -->