<?php /* Smarty version 2.6.21, created on 2012-04-25 17:39:48
         compiled from boxes/edit_hotel.tpl */ ?>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAXCLzlMT76WAVkL5VF4b6khSMp976te9NBscikrYfLsTOSQD1UxTOf_af4adrqLTht4PL9v402b3N-Q" type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
var mapa;
var markerPosition;
var markersArray = [];		
function dodajMarker(lat,lon)
{
	var marker = new GMarker(new GLatLng(lat,lon),{draggable: true, bouncy: true});
	mapa.addOverlay(marker);
	document.getElementById("t1").value=marker.getPoint().toUrlValue();
 
	GEvent.addListener(marker, "drag", function () {
 		document.getElementById("t1").value=marker.getPoint().toUrlValue();
 
	});
	return;
	}


	function dd()
	{
	    var  b = document.getElementById("t1").value;
var temp = new Array();
temp = b.split(\',\');




	    
        mapa = new GMap2(document.getElementById("mapka"),{mapTypes: [G_NORMAL_MAP,G_HYBRID_MAP,G_SATELLITE_MAP]});
    	mapa.setCenter(new GLatLng(temp[0],temp[1]), 12);		
    	mapa.addControl(new GLargeMapControl());
    	mapa.addControl(new GScaleControl());
        dodajMarker(temp[0],temp[1]);

	}
	
	function mapaStart()
	{
		if(GBrowserIsCompatible())  
		{
			mapa = new GMap2(document.getElementById("mapka"),{mapTypes: [G_NORMAL_MAP,G_HYBRID_MAP,G_SATELLITE_MAP]});
			'; ?>

			<?php if ($this->_tpl_vars['lat'] != ''): ?>
			mapa.setCenter(new GLatLng(<?php echo $this->_tpl_vars['lat']; ?>
, <?php echo $this->_tpl_vars['lon']; ?>
), 12);
			<?php else: ?>
			mapa.setCenter(new GLatLng(52, 21), 6);			
			<?php endif; ?>
			<?php echo '
			// kontrolki mapy
			mapa.addControl(new GLargeMapControl());
			mapa.addControl(new GScaleControl());
			mapa.addControl(new GMapTypeControl());   
			'; ?>

			<?php if ($this->_tpl_vars['lat'] != ''): ?>
			dodajMarker(<?php echo $this->_tpl_vars['lat']; ?>
,<?php echo $this->_tpl_vars['lon']; ?>
);
			<?php endif; ?>
			<?php echo '
				geocoder = new GClientGeocoder();
		}
	}
			
	function showAddress() 
	{
		address = document.getElementById("address").value;
		if (geocoder) 
		{
			geocoder.getLatLng(address,function(point) {if (!point) {alert(address + " nie znaleziony!");}else{mapa.setCenter(point, 13);mapa.clearOverlays();dodajMarker(point.toString().substr(1,8),point.toString().substr(13,8));}});
		}
	}
    
$().ready(function() 
{
	$("#city").autocomplete(\'all_city.php\', {width: 200,max: 5000,minChars: 0,highlight: false,multiple: false,multipleSeparator: " , ",scroll: true,scrollHeight: 200});
	$(".date_format").mask("9999-99-99");
	$(".zip_format").mask("99-999");
	$(".phones_format").mask("(99) 999 99 99");
	$(".phonek_format").mask("999 999 999");
	$(".geo_format").mask("99.99999");
});

</script>'; ?>




 	<body onload="mapaStart();">
	<body class="panel">
	<div id="bg">
	<div id="container">
		<div id="top" class="logged">
			<h1><a href="/"><img src="_images/gpspanel.png" alt="GPS Mobile" /></a></h1>
			<ul id="top-panel-tools">
				<li><a href="search.php">Obsługa zapytania <strong>POST</strong></a></li>
				<li><a href="save.php">Zapisz i <strong>drukuj dokument</strong></a></li>
				<li class="logout"><a href="logaut.php"><span>wyloguj się</span></a></li>

			</ul>
		</div>
	
		<div id="panel">
			<div id="panel-menu">
				<ul>
					<li class="item1"><a href="city.php" class="link">Widok głowny - Lista Miast</a></li>
					<li class="item2"><a href="null_atr.php">Puste atrakcje</a></li>
					<li class="item3"><a href="hotel.php">Widok hoteli</a></li>
					<li class="item4"><a href="null_add_atr.php">Dodaj atrakcje</a></li>
					<li class="item5"><a href="add_city.php">Dodaj miasto</a></li>
				</ul>
			</div>
			<div id="panel-path"><div id="panel-path-borer">
				<p class="title">Zarządzanie miastami</p>
				
				<p>Jesteś tutaj: <a href="add_city.php"><strong>
				
							<?php if ($this->_tpl_vars['amcity'] == ''): ?>
				Edytujesz miasto <?php echo $this->_tpl_vars['mcity']; ?>
			
				<?php else: ?>
				Edytujesz atrakcje <?php echo $this->_tpl_vars['mcity']; ?>
 z <?php echo $this->_tpl_vars['amcity']; ?>
			
				<?php endif; ?>
				
				</strong></a></p>
			</div></div>
		


  <?php $_from = $this->_tpl_vars['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
  <form action="edit_hotel.php?ACT=edit_hotel" id="add" name="add" method="post" enctype="multipart/form-data">
  <input name="FOR" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="hidden">
  <table style="float:right;margin-bottom:20px;width:100%"><tr>
  <td style="width:80%"></td>
<td><a href="hotel.php" class="btn_silver">Powrót do listy hoteli</a></td>




</tr></table><br />
<table class="view">

		<tr><th width="150">Należy do miasta: <?php echo $this->_tpl_vars['amcity']; ?>
 </th>
		<td title='1'></td></tr>	

		
		<tr>
		<td title='1'>
	    Nazwa:
		<input name="nameen" type="text" value="<?php echo $this->_tpl_vars['v']['Name']; ?>
"> 
		</td>
		<td>
		Hotel: <b> <?php echo $this->_tpl_vars['v']['Name']; ?>
</b><br/>
		Kategoria: Hotel<br/>
		Adres: <?php echo $this->_tpl_vars['v']['address']; ?>
 <br/>
		Ilosc gwiazdek: <b><?php echo $this->_tpl_vars['v']['Stars']; ?>
</b>
	
		<br/>
		Zdjecie:
		<a href="<?php echo $this->_tpl_vars['v']['Picture']; ?>
" target="_0">Zobacz zdjecie  </a> 
		</tr>	
		
	
	
		<tr>		
		<td title='1'>		
  <left><img src="<?php echo $this->_tpl_vars['v']['Picture']; ?>
"><br /><br /></left>
		</td>
		
		<td>

Opis:		<?php echo $this->_tpl_vars['v']['Descriptionen']; ?>

		</td>
		
		

		</tr>	
		
</table>
<table class="view">
		
		<tr>
		

		
				
		
		</tr>
		</table>
	
<table class="view">
	<tr>
	<td>
	<p>
	<?php echo '
	<input type="text" size="60" name="address" id="address" value="poszukiwany adres" onfocus="if(this.value==this.defaultValue){this.value=\'\'}" onblur="if(this.value==\'\'){this.value=this.defaultValue}" />
	'; ?>

	<input type="button" value="Szukaj!" onclick="showAddress(); return false" />
	</p>
	<br />
	Lat,Lon:<br />
	<input type="text" id="t1" value="" name="t1"  /> 	<input type="button" value="Pokaż na mapie!" onclick="dd(); return false" />
<br /><br />
	<div class="map-object" id="mapka" style="height:700px;width:700px"></div>
	</td>
</tr>
			
			
		</table>

	<br/>
		

			
<table class="view">
		<tr><th width="150">Ilość pokoi</th>
		<td title='1'><input name="population" type="text" value="<?php echo $this->_tpl_vars['v']['TotalRooms']; ?>
"></td></tr>	
		
		</table>
</form>



<?php endforeach; endif; unset($_from); ?>	
		
		<div class="panel-bottom">
			<ul class="bottom-links">
				<li class="icon1"><a href="post_edit.php">Edycja przykładowych rekordów</a></li>
				<li class="icon2"><a href="post2.php">Aktywowanie, przeniesienie<br />użytkownika na nowe urządzeniu. </a></li>
				<li class="icon3"><a href="post3.php">Logowanie </a></li>
				<li class="icon4"><a href="search2.php">Zapytania o POI </a></li>
				<li class="icon5"><a href="search_id.php">Szukanie ID</a></li>
				<li class="icon6"><a href="post5.php">Przedłużanie abonamentu</a></li>
				<li class="icon7"><a href="post1.php">Wygenerowanie identyfikatora </a></li>
				<li><a href="search_nokia.php">POST NOKIA</a></li>

			</ul>
		</div>
	</div>
	
	<div id="footer">
		<div class="footer-right">
			<a href="#"><img src="_images/footer1.png" alt="" /></a>
			<a href="#"><img src="_images/footer2.png" alt="" /></a>
		</div>
		<ul>
			<li><a href="/">Start</a></li>
			<li><a href="/o_gps.html">O Audioprzewodniku</a></li>			<li><a href="/faq.html">FAQ</a></li>			<li><a href="/pomoc.html">FAQ</a></li>			<li><a href="/kontakt.html">Kontakt</a></li>		</ul>
		<p>Prawa autorskie: GPS Mobile Guide</p>
	</div>
</div>
</div>


</body>
</html>

		


 
	
	
	
	