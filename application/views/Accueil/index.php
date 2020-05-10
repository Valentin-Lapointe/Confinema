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
        $utilisateurFilmObj = new Utilisateur_film_model();
        foreach ($film_populaire as $item) :
        ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$item->poster_path ?>" style="height: 300px;width: 200px">
                        </div>
                        <div class="col-lg-9">
                                <h4 class="text-center mb-5 font-weight-bold">
                                    <a href="<?php echo base_url('Accueil/afficher/'.$item->id) ?>"><?php echo $item->title ?></a>
                                    <span id="<?php echo'span_'.$item->id ?>">
                                        <?php
                                        $film = $utilisateurFilmObj->get($item->id);
                                        if($film) :
                                        ?>
                                        <a href="#" id="<?php echo'like_'.$item->id ?>" onclick="unlikeMovie(<?php echo $item->id ?>)">
                                            <i class="fas fa-heart btn-lg"></i>
                                        </a>
                                        <?php
                                        else :
                                        ?>
                                         <a href="#" id="<?php echo'like_'.$item->id ?>" onclick="likeMovie(<?php echo $item->id ?>)">
                                            <i class="far fa-heart btn-lg"></i>
                                        </a>
                                        <?php
                                        endif;
                                        ?>
                                    </span>
                                </h4>

                                <?php
                                if(!empty($item->overview)) :
                                ?>
                                <p class="mt-5"><?php echo $item->overview; ?></p>
                                <?php
                                else :
                                ?>
                                <p class="mt-5 text-center font-italic">Inconnu</p>
                                <?php
                                endif;
                                ?>

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


