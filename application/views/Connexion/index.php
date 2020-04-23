
<?PHP
// Erreur de connexion
if(isset($message)) :
    ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message;?>
    </div>
<?PHP
endif;
?>

<form action="" method="POST">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <?php echo form_error('email', '<label for="email" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <?php echo form_error('password', '<label for="password" generated="true" class="error" style="display: block;">', '</label>'); ?>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
    </div>
</form>

<p><a href="<?PHP echo base_url("Inscription");?>">Je n'ai pas encore de compte</a></p>
