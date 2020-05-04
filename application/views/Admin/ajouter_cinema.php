<div class="container mt-5">
    <form action="" method="POST">
        <h3 class="text-center mb-5">Ajouter un cinéma</h3>

        <?PHP
        if(isset($insert)) :
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p>Le cinéma à bien été enregistré !</p>
            </div>
        <?PHP
        endif;
        ?>

        <div class="row">
            <div class="col-lg-3">
                <label class="col-form-label">Nom :</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nom" id="nom">
                <?php echo form_error('nom', '<label for="nom" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label class="col-form-label">Adresse :</label>
            </div>
            <div class="col-lg-9">
                <input type="adresse" class="form-control" name="adresse" id="adresse">
                <?php echo form_error('adresse', '<label for="adresse" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <label class="col-form-label">Code Postal :</label>
            </div>
            <div class="col-lg-9">
                <input type="cp" class="form-control" name="cp" id="cp">
                <?php echo form_error('cp', '<label for="cp" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-3">
                <label class="col-form-label">Ville :</label>
            </div>
            <div class="col-lg-9">
                <input type="ville" class="form-control" name="ville" id="ville">
                <?php echo form_error('ville', '<label for="ville" generated="true" class="error" style="display: block;">', '</label>'); ?>
            </div>
        </div>
        <button type="submit" class=" mt-3 btn btn-primary">Enregistrer</button>
    </form>
</div>