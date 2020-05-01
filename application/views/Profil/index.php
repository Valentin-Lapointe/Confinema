<div class="container">

    <h2>Profil</h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Informations</th>
        </tr>
        </thead>
        <tbody >
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Nom Prenom :</p>
                        </div>
                        <div class="col-lg-9">
                            <p class="mb-3"><?php echo $utilisateur->nom.' '.$utilisateur->prenom ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Mail :</p>
                        </div>
                        <div class="col-lg-9">
                            <p class="mb-3"><?php echo $utilisateur->email ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Adresse :</p>
                        </div>
                        <div class="col-lg-9">
                            <p class="mb-3"><?php echo $utilisateur->adresse.' '.$utilisateur->cp.' '.$utilisateur->ville ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-lg-2">
                            <p>Admin :</p>
                        </div>
                        <div class="col-lg-9">
                            <p class="mb-3"><?php if($utilisateur->admin == 1) : echo 'Oui'; else : echo 'Non'; endif ?></p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="mt-3 col-lg-12">
                            <a href="">Modifier le mot de passe</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>





</div>


