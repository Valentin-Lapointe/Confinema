<div class="container">

    <h2>Admin</h2>

    <div class="text-right mb-2">
        <a href="<?php echo base_url("Admin/ajouter_cinema") ?>" class="btn btn-primary">Ajouter un cinéma</a>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Liste d'utilisateur</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($utilisateurs as $item) :
            ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-4 text-center">
                            <?php echo $item->nom?> <br>
                            <?php echo $item->prenom?>
                        </div>

                        <div class="col-lg-4 text-center">
                            <?php echo $item->email?> <br>
                            <?php echo $item->adresse.' '.$item->cp.' '.$item->ville?>
                        </div>

                        <div class="col-lg-4 text-center">
                            <select class="custom-select" name="" id="">
                                <option value="0" <?php if($item->admin == 0){echo'selected="selected"';}?>>Non Admin</option>
                                <option value="1" <?php if($item->admin == 1){echo'selected="selected"';}?>>Admin</option>
                            </select> <br>
                            <select class="custom-select" name="" id="">
                                <option value="0" <?php if($item->ban == 0){echo'selected="selected"';}?>>Non Banni</option>
                                <option value="1" <?php if($item->ban == 1){echo'selected="selected"';}?>>Banni</option>
                            </select>
                        </div>

                    </div>

                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>

</div>


