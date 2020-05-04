<div class="container">

    <h2>Cinémas</h2>

    <?PHP

    // ON reprend les filtres en session
    if(isset($insert)):
        $rayon		    = $insert['rayon'];
        $adresse		= $insert['adresse'];
        $cp 			= $insert['cp'];
        $ville			= $insert['ville'];
    endif;
    ?>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Carte des cinemas</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <form action="#" method="post">
                    <div class="row">
                        <div class="row col-lg-10">

                            <div class="col-lg-2">
                                <p>rayon :</p>
                                <select class="custom-select" name="rayon" id="rayon">
                                    <option value="5" <?php if(isset($insert) && $rayon == '5'){ echo'selected="selected"'; } ?>> 5 km </option>
                                    <option value="10" <?php if(isset($insert) && $rayon == '10'){ echo'selected="selected"'; } ?>> 10 km </option>
                                    <option value="15" <?php if(isset($insert) && $rayon == '15'){ echo'selected="selected"'; } ?>> 15 km </option>
                                    <option value="20" <?php if(isset($insert) && $rayon == '20'){ echo'selected="selected"'; } ?>> 20 km </option>
                                    <option value="50" <?php if(isset($insert) && $rayon == '50'){ echo'selected="selected"'; } ?>> 50 km </option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <p>adresse :</p>
                                <input class="form-control" name="adresse" id="adresse" type="text" value="<?php if(isset($insert)) { echo $adresse; } else {echo $utilisateur->adresse;} ?>">
                            </div>

                            <div class="col-lg-3">
                                <p>Code postal :</p>
                                <input class="form-control" name="cp" id="cp" type="text" value="<?php if(isset($insert)) { echo $cp; } else {echo $utilisateur->cp;} ?>">
                            </div>

                            <div class="col-lg-3">
                                <p>ville :</p>
                                <input class="form-control" name="ville" id="ville" type="text" value="<?php if(isset($insert)) { echo $ville; } else {echo $utilisateur->ville;} ?>">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <p></p> <br>
                            <div class="text-right">
                                <input class="btn btn-primary" type="submit">
                            </div>
                        </div>

                    </div>
                </form>

                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div id="map" style="height: 600px"></div>
                    </div>
                </div>

            </td>
        </tr>
        </tbody>
    </table>

</div>