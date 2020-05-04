<script src="<?PHP echo base_url(); ?>assets/leaflet/leaflet.js"></script>
<script src="<?PHP echo base_url(); ?>assets/leaflet/leaflet-easyprint.js"></script>
<script>

    var planes = [
        <?PHP
            foreach ($cinemas as $row) :
                echo '["' . $row->nom_cinema . '",' . $row->latitude . ',' . $row->longitude . '],';
            endforeach;
        ?>
     ];

    var markers = []; // Nous initialisons la liste des marqueurs
    var map = L.map('map').setView([-41.3058, 174.82082], 8);
    mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
        }).addTo(map);

    for (var i = 0; i < planes.length; i++) {

        var icon = '<?PHP echo base_url('assets/'); ?>marker-icon.png';

        marker = new L.marker([
            planes[i][1],
            planes[i][2]],{
            icon: L.icon({
                iconUrl: icon,
                iconSize: [25, 41],
                shadowUrl : '',})
        })
            .bindPopup(planes[i][0])
            .addTo(map);
        markers.push(marker); // Nous ajoutons le marqueur à la liste des marqueurs
    }


    //on ajoute le marqueur centrale
    var icon = '<?PHP echo base_url('assets/'); ?>marker-icon-0.png';

    var centre = [
        <?php
        echo '["'.$centre["adresse"].'",'.$centre["latitude"].','.$centre["longitude"].'],';
        ?>
    ];

    marker = new L.marker([
        centre[0][1],
        centre[0][2]],{
        icon: L.icon({
            iconUrl: icon,
            iconSize: [25, 41],
            shadowUrl : '',})
    })
        .bindPopup(centre[0][0])
        .addTo(map);
    markers.push(marker); // Nous ajoutons le marqueur à la liste des marqueurs


    var group = new L.featureGroup(markers); // Nous créons le groupe des marqueurs pour adapter le zoom
    map.fitBounds(group.getBounds().pad(0.2)); // Nous demandons à ce que tous les marqueurs soient visibles, et ajoutons un padding (pad(0.5)) pour que les marqueurs ne soient pas coupés

    var printer = L.easyPrint({
        tileLayer: 'cartographie',
        sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
        filename: 'myMap',
        exportOnly: true,
        hideControlContainer: true
    }).addTo(map);

</script>