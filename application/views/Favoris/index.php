<div class="container">

    <h2>Favoris</h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Vos films favoris</th>
        </tr>
        </thead>
        <tbody >
        <?php
        $utilisateurFilmObj = new Utilisateur_film_model();
        foreach ($film_favoris as $item) :
            ?>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$item['poster_path'] ?>" style="height: 300px;width: 200px">
                        </div>
                        <div class="col-lg-9">
                            <h4 class="text-center mb-5 font-weight-bold">
                                <a href="<?php echo base_url('Accueil/afficher/'.$item['id']) ?>"><?php echo $item['title'] ?></a>
                                <span id="<?php echo'span_'.$item['id'] ?>">
                                        <?php
                                        $film = $utilisateurFilmObj->get($item['id']);
                                        if($film) :
                                            ?>
                                            <a href="#" id="<?php echo'like_'.$item['id'] ?>" onclick="unlikeMovie(<?php echo $item['id'] ?>)">
                                            <i class="fas fa-heart btn-lg"></i>
                                        </a>
                                        <?php
                                        else :
                                            ?>
                                            <a href="#" id="<?php echo'like_'.$item['id'] ?>" onclick="likeMovie(<?php echo $item['id'] ?>)">
                                            <i class="far fa-heart btn-lg"></i>
                                        </a>
                                        <?php
                                        endif;
                                        ?>
                                    </span>
                            </h4>

                            <?php
                            if(!empty($item['overview'])) :
                                ?>
                                <p class="mt-5"><?php echo $item['overview']; ?></p>
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
</div>


