<div class="container">

    <h2>Details</h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Details du film</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="row">

                        <div class="col-lg-3">
                            <img src="<?php echo'https://image.tmdb.org/t/p/w220_and_h330_face/'.$details->poster_path ?>" style="height: 300px;width: 200px">

                            <div class="row mt-2">
                                <div class="col-lg-4">
                                    <p>note : </p>
                                </div>
                                <div class="col-lg-8">
                                    <?php
                                    echo $details->vote_average.' / 10';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">

                            <h4 class="text-center mb-5 text-primary font-weight-bold"><?php echo $details->title ?></h4>

                            <p class="mt-5"><?php echo $details->overview ?></p>

                            <div class="row mt-5">
                                <div class="col-lg-3">
                                    <p>Genres : </p>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    $tt = count($details->genres);
                                    $cpt = 0;
                                    foreach ($details->genres as $item)
                                    {
                                        echo $item->name;
                                        $cpt ++;
                                        if($cpt != $tt){ echo' / ';}
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <p>Adulte : </p>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    if($details->adult == 'true'){ echo'Oui';}else{ echo 'Non';}
                                    ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <p>Sortie au cinéma : </p>
                                </div>
                                <div class="col-lg-9">
                                    <?php echo date('d-m-Y',strtotime($details->release_date)); ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <p>Budget : </p>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    if($details->budget == 0){
                                        echo 'Inconnu';
                                    }else{

                                        echo $details->budget.' $';
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <p>Recette : </p>
                                </div>
                                <div class="col-lg-9">
                                    <?php
                                    if($details->revenue == 0){
                                        echo 'Inconnue';
                                    }else{

                                        echo $details->revenue.' $';
                                    }
                                    ?>
                                </div>
                            </div>


                        </div>
                    </div>

                </td>
            </tr>
        </tbody>
    </table>

</div>


