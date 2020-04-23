<?php
if(isset($error)) :
?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Erreur lors de l'inscription !</h4>
    </div>
<?php
endif;
?>

<?php
if(isset($verify)) :
    ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Erreur, les 2 mots de passe ne sont pas identiques !</h4>
    </div>
<?php
endif;
?>

<form action="" method="POST">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="nom" id="nom" value="<?PHP if(!isset($insert)) echo set_value('nom'); ?>">
        </div>
        <?php echo form_error('nom', '<label for="nom" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Prénom : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="prenom" id="prenom" value="<?PHP if(!isset($insert)) echo set_value('prenom'); ?>">
        </div>
        <?php echo form_error('prenom', '<label for="prenom" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" id="email" value="<?PHP if(!isset($insert)) echo set_value('email'); ?>">
        </div>
        <?php echo form_error('email', '<label for="email" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mot de passe :</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <?php echo form_error('password', '<label for="password" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmer mot de passe :</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password_verify" id="password_verify">
        </div>
        <?php echo form_error('password_verify', '<label for="password_verify" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Adresse : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="adresse" id="adresse" value="<?PHP if(!isset($insert)) echo set_value('adresse'); ?>">
        </div>
        <?php echo form_error('adresse', '<label for="adresse" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Code Postal : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="cp" id="cp" value="<?PHP if(!isset($insert)) echo set_value('cp'); ?>">
        </div>
        <?php echo form_error('cp', '<label for="cp" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Ville : </label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="ville" id="ville" value="<?PHP if(!isset($insert)) echo set_value('ville'); ?>">
        </div>
        <?php echo form_error('ville', '<label for="ville" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </div>
</form>


<p><a href="<?PHP echo base_url("Connexion");?>">J'ai déjà un compte</a></p>
