<script>

    function changeAdmin(id_utilisateur){
        var etat = $('#selectAdmin').val();

        $.ajax({
            url: base_url + "Admin/ajax_changeAdmin",
            data:{id_utilisateur: id_utilisateur, etat: etat},
            type: "POST",
            success: function(){
            }
        });
    }

    function changeBan(id_utilisateur){
        var etat = $('#selectBan').val();
        $.ajax({
            url: base_url + "Admin/ajax_ChangeBan",
            data:{id_utilisateur: id_utilisateur, etat: etat},
            type: "POST",
            success: function(){
            }
        });
    }
</script>