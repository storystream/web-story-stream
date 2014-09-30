<?php /* Smarty version 2.6.21, created on 2012-11-07 23:18:23
         compiled from boxes/map.tpl */ ?>
<script src="http://maps.google.com/maps?file=api&amp;v=3&amp;sensor=true&amp;key=ABQIAAAAXCLzlMT76WAVkL5VF4b6khSMp976te9NBscikrYfLsTOSQD1UxTOf_af4adrqLTht4PL9v402b3N-Q" type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
var mapa;
var markerPosition;
var markersArray = [];	
var id_user = \''; ?>
<?php echo $this->_tpl_vars['GET']['FOR']; ?>
<?php echo '\';
var ulat = \''; ?>
<?php echo $this->_tpl_vars['lat']; ?>
<?php echo '\';
var ulon = \''; ?>
<?php echo $this->_tpl_vars['lon']; ?>
<?php echo '\';
	
function dodajMarker(lat,lon,str,i)
{
	var icon = new GIcon();
	icon.shadow = null;
	icon.iconAnchor = new GPoint(11, 11);
	icon.infoWindowAnchor = new GPoint(12, 1);
	icon.infoShadowAnchor = new GPoint(12, 1);
	icon.image = "http://maps.google.com/mapfiles/ms/micons/blue-dot.png";
	
	if (i==0)
	{
		var marker = new GMarker(new GLatLng(lat,lon),{icon:icon,draggable: true});
		mapa.setCenter(new GLatLng(lat, lon));
	}else{
		var marker = new GMarker(new GLatLng(lat,lon),{draggable: false});
	}
	mapa.addOverlay(marker);
	GEvent.addListener(marker, "click", function () {
 		alert("Date of activity: "+str);
	});
	console.log(lat+\' - \'+lon);
	return;
}
function mapaStart()
{
	
	
	
	var i__ = 0;
	
	$.getJSON("jmap.php?id="+id_user,
	  {
	    format: "json"
	  },
	  function(data) {
		  mapa.clearOverlays();
		  
	    $.each(data, function(i,item){
	     
			dodajMarker(item.lat,item.lon,item.time,i__);
			i__ += 1;
		 
	    });
	  });
	 
	if(GBrowserIsCompatible())  
	{
		mapa = new GMap2(document.getElementById("mapka"),{mapTypes: [G_NORMAL_MAP,G_HYBRID_MAP,G_SATELLITE_MAP]});
		mapa.setCenter(new GLatLng(ulat, ulon), 17);			
		// kontrolki mapy
		mapa.addControl(new GLargeMapControl());
		mapa.addControl(new GScaleControl());
		mapa.addControl(new GMapTypeControl());   
		geocoder = new GClientGeocoder();
	}
}
	
var auto_refresh = setInterval(
function()
{

	$.getJSON("jmap.php?id="+id_user,
	  {
	    format: "json"
	  },
	  function(data) {
		  mapa.clearOverlays();
		  i_ = 0;
	    $.each(data, function(i,item){
	     
			dodajMarker(item.lat,item.lon,item.time,i_);
			i_ += 1;
	    });
	  });
	  
}, 5000);
</script>'; ?>




<body onload="mapaStart();" class="panel">

<div id="bg">
<div id="container">
	<div id="top" class="logged">
		<ul id="top-panel-tools">
			<li class="logout"><a href="logaut.php"><span>Logout</span></a></li>
		</ul>
	</div>
	<div id="panel-menu">
		<ul>
			<li class="item1"><a href="index.php" class="link">Home</a></li>
			<li class="item5"><a href="list.php">Users</a></li>
			<li class="item5"><a href="add_art.php">Add content</a></li>

		</ul>
	</div>
	<br /><br />
	<div class="map-object" id="mapka" style="height:700px;width:100%;margin-bottom:15px"></div>
					
<div id="footer">
		<div class="footer-right">
		</div>
		<p></p>
	</div>

	</div>
	</div>
	
