<div class="container">

    <h2>Contact</h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Nous contacter</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?PHP
                // Erreur de connexion
                if(isset($send)) :
                    ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Votre message a bien été envoyé !
                    </div>
                <?PHP
                endif;
                ?>

                <form action="" method="POST" class="mt-3">

                    <div class="col-lg-12">
                        <p>Email :</p>
                        <input type="text" name="email" class="col-lg-6">
                        <?php echo form_error('email', '<label for="email" generated="true" class="error" style="display: block;">', '</label>'); ?>
                    </div>

                    <div class="col-lg-12">
                        <p>Sujet :</p>
                        <input type="text" name="sujet" class="col-lg-6">
                        <?php echo form_error('sujet', '<label for="sujet" generated="true" class="error" style="display: block;">', '</label>'); ?>

                    </div>

                    <div class="col-lg-12">
                        <p>Message :</p>
                        <textarea type="text" name="message" class="col-lg-6"></textarea>
                        <?php echo form_error('message', '<label for="message" generated="true" class="error" style="display: block;">', '</label>'); ?>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <input type="submit" class="btn btn-primary">
                    </div>

                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>
