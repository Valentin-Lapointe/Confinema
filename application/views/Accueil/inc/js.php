<script>

    //////////////////////////////////////////////////////////////////////////////////
    /////////FILM POPULAIRE
    /////////////////////////////////////////////////////////////////////////////////
function hideListPopulaire() {

    $('#listeFilmPopulaire').fadeOut(200);
    $('#buttonFilmPopulaire').html('<a href="#" onclick="showListPopulaire()"><i class="fas fa-plus-circle"></i></a>');

}

function showListPopulaire() {


    $('#listeFilmPopulaire').fadeIn(200);
    $('#buttonFilmPopulaire').html('<a href="#" onclick="hideListPopulaire()"><i class="fas fa-minus-circle"></i></a>');

}

    //////////////////////////////////////////////////////////////////////////////////
    /////////FILM MIEUX NOTER
    /////////////////////////////////////////////////////////////////////////////////
    function hideListNote() {

        $('#listeFilmNote').fadeOut(200);
        $('#buttonFilmNote').html('<a href="#" onclick="showListNote()"><i class="fas fa-plus-circle"></i></a>');

    }

    function showListNote() {


        $('#listeFilmNote').fadeIn(200);
        $('#buttonFilmNote').html('<a href="#" onclick="hideListNote()"><i class="fas fa-minus-circle"></i></a>');

    }

    //////////////////////////////////////////////////////////////////////////////////
    /////////FILM A VENIR
    /////////////////////////////////////////////////////////////////////////////////
function hideListVenir() {

    $('#listeFilmVenir').fadeOut(200);
    $('#buttonFilmVenir').html('<a href="#" onclick="showListVenir()"><i class="fas fa-plus-circle"></i></a>');

}

function showListVenir() {


    $('#listeFilmVenir').fadeIn(200);
    $('#buttonFilmVenir').html('<a href="#" onclick="hideListVenir()"><i class="fas fa-minus-circle"></i></a>');

}



    //////////////////////////////////////////////////////////////////////////////////
    /////////AIMER UN FILM
    /////////////////////////////////////////////////////////////////////////////////
function likeMovie(id){
    $('#like_'+id).fadeOut(200);
    $('#span_'+id).html('<a href="#" id="like_'+id+'" onclick="unlikeMovie('+id+')"><i class="fas fa-heart btn-lg"></i></a>');

    $.ajax({
        url: base_url + "Favoris/ajax_addMovie",
        data:{id_film: id},
        type: "POST",
        success: function(){
        }
    });
}


    //////////////////////////////////////////////////////////////////////////////////
    /////////NE PLUS AIMER UN FILM
    /////////////////////////////////////////////////////////////////////////////////
function unlikeMovie(id){

    $('#like_'+id).fadeOut(200);
    $('#span_'+id).html('<a href="#" id="like_'+id+'" onclick="likeMovie('+id+')"><i class="far fa-heart btn-lg"></i></a>');

    $.ajax({
        url: base_url + "Favoris/ajax_removeMovie",
        data:{id_film: id},
        type: "POST",
        success: function(){
        }
    });

}
</script>