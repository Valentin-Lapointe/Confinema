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

</script>