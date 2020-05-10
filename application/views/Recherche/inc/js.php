<script>

    $(document).ready(function(){
        $("#movieName").on("input", function(){
            $.ajax({
                url: base_url + "Recherche/ajax_getMovies",
                data:{name: $(this).val()},
                type: "POST",
                success: function(data){
                    $('#moviesList').html(data);
                }
            });
        });
    });

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