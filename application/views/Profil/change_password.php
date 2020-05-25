<div class="container">

    <h2>Profil</h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Changer le mot de passe</th>
        </tr>
        </thead>
        <tbody>
        <?PHP
        // succes
        if(isset($insert)) :
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Votre mot de passe a bien été modifié !
            </div>
        <?PHP
        endif;
        // Erreur
        if(isset($verify)) :
            ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Erreur ! Le nouveau mot de passe n'est pas identique a la vérification.
            </div>
        <?PHP
        endif;
        if(isset($error)) :
            ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Erreur ! Il y a un problème lors du changement, veuiller ressesayer.
            </div>
        <?PHP
        endif;
        ?>
            <tr>
                <td>
                    <div class="col-lg-12">
                        <form action="" method="POST" >
                            <div>
                                <p>Ancien mot de passe :</p>
                                <input type="password" class="col-lg-6 form-control" name="last_password">
                                <?php echo form_error('last_password', '<label for="last_password" generated="true" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                            <div>
                                <p>Nouveau mot de passe :</p>
                                <input type="password" class="col-lg-6 form-control" name="new_password">
                                <?php echo form_error('new_password', '<label for="new_password" generated="true" class="error" style="display: block;">', '</label>'); ?>
                            </div>
                            <div>
                                <p>Confirmer le nouveau mot de passe :</p>
                                <input type="password" class="col-lg-6 form-control" name="confirm_new_password">
                                <?php echo form_error('confirm_new_password', '<label for="confirm_new_password" generated="true" class="error" style="display: block;">', '</label>'); ?>
                            </div>

                            <div class="mt-4">
                                <input type="submit" class="col-lg-2 form-control btn btn-primary">
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>


