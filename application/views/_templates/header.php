<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Confinéma</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?PHP
    // Si fichier css
    if(isset($css_file)) : echo $css_file; endif;
    ?>
</head>
<body>

<?php
if($this->session->userdata('id')) :
?>
<div class="container">

    <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light bg-light col-lg-12">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if($menu == 'accueil') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'accueil') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Accueil");?>">Accueil</a>
                    </li>
                    <li class="nav-item <?php if($menu == 'recherche') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'recherche') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Recherche");?>">Rechercher</a>
                    </li>
                    <li class="nav-item <?php if($menu == 'favoris') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'favoris') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Favoris");?>">Favoris</a>
                    </li>
                    <li class="nav-item <?php if($menu == 'cinema') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'cinema') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Cinema");?>">Cinémas</a>
                    </li>
                    <li class="nav-item <?php if($menu == 'profil') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'profil') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Profil");?>">Profil</a>
                    </li>
                    <?php
                    if($this->session->userdata('admin') == 1) :
                    ?>
                    <li class="nav-item <?php if($menu == 'admin') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'admin') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Admin");?>">Admin</a>
                    </li>
                    <?php
                    endif;
                    ?>
                    <li class="nav-item <?php if($menu == 'contact') : echo 'active'; endif ?> mr-4">
                        <a class="nav-link <?php if($menu == 'contact') : echo 'font-weight-bold'; endif ?>" href="<?PHP echo base_url("Contact");?>">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a class="nav-link" href="<?PHP echo base_url("Connexion/deconnexion");?>">Deconnexion</a>
                </form>
            </div>
        </nav>

    </div>

</div>
<?php
endif;
?>
