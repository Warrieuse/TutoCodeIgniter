<div class="container">
  <div class="row">
    <?= heading($title);// on affiche le titre sa valeur est définit dans controlleur  ?>
  </div>
  <div class="row">
    <?= form_open('contact', ['class' => 'form-horizontal']); // on ouvre la balise form = form_open([$action = ''[, $attributes = ''[, $hidden = []]]])?>
    
    <div class="form-group">
        <?= form_label("Votre nom&nbsp;:", "name", ['class' => "col-md-2 control-label "]) // puis le label qui seras rattaché à l'input du dessous = form_label([$label_text = ''[, $id = ''[, $attributes = []]]])?>
        <div class="col-md-10   <?= empty( form_error('name')) ?'':'has-error'?>   ">
        <?= form_input(['name' => "name", 'id' => "name", 'class' => 'form-control'], set_value('name')) // et l'input = form_input([$data = ''[, $value = ''[, $extra = ''[, $type = 'text']]]])?>
        <span class="help-block">    <?= form_error('name');   ?></span>
        </div>
    </div>

    <!--Tout d'abord, s'il y a un message d'erreur, j'ajoute la classe has-error au bloc contenant le champ 
    du formulaire. Ensuite, j'ajoute la valeur du champ reçue par le serveur comme deuxième paramètre de la 
    fonction form_input(). Cette dernière remplira le champ avec cette valeur. Et finalement, j'ajoute le message 
    d'erreur, s'il existe, en dessous du champ.-->
    <div class="form-group">
        <?= form_label("Votre e-mail&nbsp;:", "email", ['class' => "col-md-2 control-label "]) ?>
        <div class="col-md-10 <?= empty( form_error('email')) ?'':'has-error' // dans l'attribut class je met une condition si ce dernier est vide(empty) et donc je rajoute une autre class si il rempli cette condition.?>">
            <?= form_input(['name' => "email", 'id' => "email", 'type' => 'email', 'class' => 'form-control'], set_value('email')) ?>
            <span class="help-block"><?= form_error('email'); // ce span existeras uniquement si le champ remplis les conditions cad vide.?></span>
        </div>
    </div>
<!--CONFIRMATION EMAIL-->
    <div class="form-group">
            <?= form_label("Confirmation e-mail&nbsp;:", "email", ['class' => "col-md-2 control-label "]) ?>
            <div class="col-md-10 <?= empty( form_error('emailconf')) ?"" : "has-error" ?>">
                <?= form_input(['name' => "emailconf", 'id' => "emailconf", 'type' => 'email', 'class' => 'form-control'], set_value('emailconf')) ?>
                <span class="help-block"><?= form_error('emailconf'); ?></span>
            </div>
    </div>

    <div class="form-group">
			<?= form_label("Titre&nbsp;:", "title", ['class' => "col-md-2 control-label "]) ?>
			<div class="col-md-10 <?= empty( form_error('title')) ?'':'has-error' ?>">
				<?= form_input(['name' => "title", 'id' => "title", 'class' => 'form-control'], set_value('title')) ?>
				<span class="help-block"><?= form_error('title'); ?></span>
			</div>
		</div>

    <div class="form-group">
      <?= form_label("Message&nbsp;:", "message", ['class' => "col-md-2 control-label "]) ?>
      <div class="col-md-10 <?= empty( form_error('message')) ?'':'has-error' ?>">
        <?= form_textarea(['name' => "message", 'id' => "message", 'class' => 'form-control'], set_value('message')) // form_textarea([$data = ''[, $value = ''[, $extra = '']]])?>
        <span class="help-block"> <?= form_error('message');   ?></span>
        </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <?= form_submit("send", "Envoyer", ['class' => "btn btn-default"]); //form_submit([$data = ''[, $value = ''[, $extra = '']]])?>
      </div>
    </div>
    <?= form_close() // et on ferme notre form = form_close([$extra = ''])?>
  </div>
</div>
