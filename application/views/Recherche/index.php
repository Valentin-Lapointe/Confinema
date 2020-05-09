<div class="container">

    <h2>Rechercher</h2>

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
            <th>Rechercher par titre</th>
        </tr>
        </thead>
        <tbody class="border-bottom">
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-11">
                            <input id="movieName" type="text" class="col-lg-12" onkeypress="getMovies()" placeholder="Entrer le titre du film...">
                        </div
                    </div>
                </td>
            </tr>
        </tbody>

        <tbody id="moviesList">
        </tbody>
    </table>
    
</div>

