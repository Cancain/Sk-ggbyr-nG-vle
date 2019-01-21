<!-- Footer-->
<div class="footer">
    <h3>Gävle</h3>
    <h2>Atlasgatan 8</h2>
    <p><a href="mailto:lena.unden@skaggbyran.se">lena.unden@skaggbyran.se</a></p>
</div>

<script src="<?php echo URLROOT; ?>js/navbar.js"></script>
<script src="<?php echo URLROOT; ?>js/logout.js"></script>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = { lat: -25.344, lng: 131.036 };
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), { zoom: 4, center: uluru });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({ position: uluru, map: map });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
</body>

</html>