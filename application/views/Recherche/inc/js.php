<script>

    function getMovies(){

        var name = $('#movieName').val();

        $.ajax({
            url: base_url + "Recherche/ajax_getMovies",
            data:{name: name},
            type: "POST",
            success: function(data){
                $('#moviesList').html(data);
            }
        });
    }

</script>