<?php
$article_url = 'blog/' . $alias . '_' . $id;
?>
<div class="col-md-4">
  <?= heading(anchor($article_url, htmlentities($title)), 2); ?>
  <p>
    <small>
      <?= nice_date($date, 'd/m/Y'); ?>
      -
      <?= $author ?>
      <?php if ($this->auth_user->is_connected) : ?>
        -
        <?= $this->article_status->label[$status]; ?>
      <?php endif; ?>
    </small>
  </p>
  <p><?= nl2br(htmlentities($content)); ?>... <?= anchor($article_url, "Lire la suite"); ?></p>
</div>
<!--Nous avons ajouté du code PHP pour affecter l'URI de l'article dans une variable et utilisé cette variable pour générer un lien sur le titre et après le résumé de l'article. Maintenant, en affichant la page d'accueil du blog, vous pouvez cliquer sur le titre de l'article à visualiser ou sur son lien « Lire la suite » (si, si, vous pouvez le faire maintenant, ça doit marcher).-->
