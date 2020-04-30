<div class="container">

    <h2>Accueil</h2>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Films les plus populaires</th>
                <th id="buttonFilmPopulaire" class="text-right"><a href="#" onclick="hideListPopulaire()"><i class="fas fa-minus-circle"></i></a></th>
            </tr>
        </thead>
        <tbody id="listeFilmPopulaire">
        <?php
        foreach ($film_populaire as $item) :
        ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$item->poster_path ?>" style="height: 300px;width: 200px">
                        </div>
                        <div class="col-lg-9">
                            <h4 class="text-center mb-5"><?php echo $item->title ?></h4>
                            <p class="mt-5"><?php echo $item->overview ?></p>
                        </div>
                    </div>

                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Films les mieux notés</th>
            <th id="buttonFilmNote" class="text-right"><a href="#" onclick="hideListNote()"><i class="fas fa-minus-circle"></i></a></th>
        </tr>
        </thead>
        <tbody id="listeFilmNote">
        <?php
        foreach ($film_mieux_note as $item) :
            ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$item->poster_path ?>" style="height: 300px;width: 200px">
                        </div>
                        <div class="col-lg-9">
                            <h4 class="text-center mb-5"><?php echo $item->title ?></h4>
                            <p class="mt-5"><?php echo $item->overview ?></p>
                        </div>
                    </div>

                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Films à venir</th>
            <th id="buttonFilmVenir" class="text-right"><a href="#" onclick="hideListVenir()"><i class="fas fa-minus-circle"></i></a></th>
        </tr>
        </thead>
        <tbody id="listeFilmVenir">
        <?php
        foreach ($film_a_venir as $item) :
            ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$item->poster_path ?>" style="height: 300px;width: 200px">
                        </div>
                        <div class="col-lg-9">
                            <h4 class="text-center mb-5"><?php echo $item->title ?></h4>
                            <p class="mt-5"><?php echo $item->overview ?></p>
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


