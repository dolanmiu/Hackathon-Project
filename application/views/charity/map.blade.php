@layout('main')

@section('content')

<!-- <div class="hero-unit">
<h1>Heading</h1>
<p>Tagline</p>
<p> <a class="btn btn-primary btn-large"> Learn more </a> </p>
</div> -->
<div class="row-fluid marketing"> 
<!--charity name-->
<div class="row">
<div class="span10 offset1">
<div class="span2"> <img src="http://appsforipads.net/wp-content/uploads/2011/01/Free_Google-150x150.png" class="img-polaroid" width="150" height="150"> </div>
<div class="span8">

@if(Session::has('amount_donated'))
<div class="hero-unit">
<h1>Thank you for your donation!</h1>
<p>It means a lot to us.</p>
</div>
@endif

<div id='map-canvas' style='width:600px;height:400px;'></div>
<h1>{{ $charity->name }}</h1>

</div>
</div>
</div>

</div>

@endsection
@section('scripts')

<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?libraries=geometry,visualization&key=AIzaSyCHiF3bx_4SeVTYEe0DKSjDB9KGERzVWF0&sensor=false"></script>
<script type="text/javascript">
/* Data points defined as an array of LatLng objects */

    var heatmapData = [
        <?php foreach($points as $p):
            $split = explode(',', $p);
            echo "new google.maps.LatLng($split[0], $split[1]),"
        endforeach;?>
    ];
	var heatmapData = [
		new google.maps.LatLng(37.782, -122.447),
    
	];

	var sanFrancisco = new google.maps.LatLng(37.774546, -122.433523);

	map = new google.maps.Map(document.getElementById('map-canvas'), {
center: sanFrancisco,
zoom: 13,
mapTypeId: google.maps.MapTypeId.SATELLITE
});

var heatmap = new google.maps.visualization.HeatmapLayer({
data: heatmapData
});
heatmap.setMap(map);
</script>
@endsection
