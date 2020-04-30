
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
<div class="container mt-5">
    <form action="" method="POST">
        <h1 class="text-center mb-5">CONFINEMA</h1>
        <div class="row">
            <div class="col-lg-3">
                <label for="inputEmail3" class="col-form-label">Email :</label>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" name="email" id="email">
                <?php echo form_error('email', '<label for="email" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="inputPassword3" class="col-form-label">Mot de passe :</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" name="password" id="password">
                <?php echo form_error('password', '<label for="password" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>
        <button type="submit" class=" mt-3 btn btn-primary">Connexion</button>
    </form>
    <p class="mt-4"><a href="<?PHP echo base_url("Inscription");?>">Je n'ai pas encore de compte</a></p>
</div>

