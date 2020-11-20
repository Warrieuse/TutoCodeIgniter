<!--créons la vue qui sera affichée en cas de succès.
Son contenu n'est pas spécialement important, il s'agit juste d'un message de réussite.-->
<div class="container">
  <div class="row">
    <?= heading( $title); // on affiche le titre?>
  </div>
  <div class="row alert alert-success" role="alert">
    Merci de nous avoir envoyé ce mail. Nous y répondrons dans les meilleurs délais.
  </div>
  <div class="row text-center">
    <?= anchor("index", "Fermer", ['class' => "btn btn-primary"]); // un bouton close pour fermer et revenir à la page index?>
  </div>
</div>
