<?php /* Smarty version 2.6.21, created on 2012-04-23 21:11:16
         compiled from boxes/edit_event.tpl */ ?>

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
				<li class="item1"><a href="#" class="link">Widok głowny - Lista Miast</a></li>
				<li class="item2"><a href="null_atr.php">Puste atrakcje</a></li>
				<li class="item3"><a href="hotel.php">Widok hoteli</a></li>
				<li class="item4"><a href="null_add_atr.php">Dodaj atrakcje</a></li>
				<li class="item5"><a href="add_city.php">Dodaj miasto</a></li>
			</ul>
		</div>
		<div id="panel-path"><div id="panel-path-borer">
			<p class="title">Zarządzanie miastami</p>
			<p>Jesteś tutaj: <a href="add_city.php"><strong>Dodaj event</strong></a></p>
		</div></div>
	    <?php $_from = $this->_tpl_vars['event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		
		<form method="post" action="edit_event.php?ACT=edit_event" class="panel-form" name="add" id="add">
		    <input type="hidden" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" name="FOR">
		    <input type="hidden" value="<?php echo $this->_tpl_vars['GET']['FOR2']; ?>
" name="FOR2">
			
			 <input type="hidden" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" name="FOR">
			<fieldset class="form-actions">
				<ul>
					<li class="icon1"><a href="info.php?FOR=<?php echo $this->_tpl_vars['GET']['FOR2']; ?>
">Powróć</a></li>
					<li class="icon2"><a href="#" onclick="document.add.reset();return false;">Zacznij od nowa</a></li>
					<li class="icon3"><a href="#" onclick="document.add.submit();return false;">Zapisz</a></li>
				</ul>
			</fieldset>


			<fieldset>
				<div class="edit-photo">
		
				</div>
				<div class="htmlarea">
					<h3>OPIS - Język polski</h3>
					<textarea id="editor1" class="tinymce" name="desc" /><?php echo $this->_tpl_vars['v']['desc']; ?>
</textarea>
					
					
				</div>
				<div class="input-line">
					<label for="input1">Nazwa eventu</label>
					<input class="input" name="name" value="<?php echo $this->_tpl_vars['v']['name']; ?>
" type="text">
				</div>
				<div class="input-line">
					<label for="input2">Start event</label>
					<input class="input"  name="start_date" type="text" value="<?php echo $this->_tpl_vars['v']['start_date']; ?>
" id="datepicker">
				</div>
				<div class="input-line">
					<label for="input3">Koniec event</label>
					<input class="input" name="expiration_date" type="text" value="<?php echo $this->_tpl_vars['v']['expiration_date']; ?>
" id="datepicker2">
				</div>
			</fieldset>
		
		
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





















