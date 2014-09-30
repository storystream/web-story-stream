<?php /* Smarty version 2.6.21, created on 2012-04-24 18:39:00
         compiled from boxes/null_atr.tpl */ ?>
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
				<li class="item1"><a href="index.php" class="link">Widok głowny - Lista Miast</a></li>
				<li class="item2"><a href="null_atr.php">Puste atrakcje</a></li>
				<li class="item3"><a href="hotel.php">Widok hoteli</a></li>
				<li class="item4"><a href="null_add_atr.php">Dodaj atrakcje</a></li>
				<li class="item5"><a href="add_city.php">Dodaj miasto</a></li>
			</ul>
		</div>
		<div id="panel-path"><div id="panel-path-borer">
			<p class="title">Zarządzanie miastami</p>
			<p>Jesteś tutaj: <a href="#"><strong>Lista pustych atrakcji</strong></a></p>
		</div></div>





		<form method="post" action="null_atr.php?ACT=post" id="list-table">
			<input name="page" value="<?php echo $this->_tpl_vars['GET']['pplist_lex']; ?>
" type="hidden">
			
			<fieldset class="top-fieldset">
				<p class="execute"><input type="submit" value="Wykonaj operację dla zaznaczonych elementów" /></p>
				<ul class="navigator">
					<?php echo $this->_tpl_vars['renderPager']; ?>

				</ul>
			</fieldset>
			<div>
				
				
				

<table class="view">
		<tr>
			<th width="50">ID</th>
			<th>Nazwa PL</th>
			<th>Nazwa EN</th>
			<th>Kraj</th>			
			<th>Dane geograficzne</th>
						<th>Ranga</th>
			<th>Nagrane/do nagrania</th>
			<th>Akcje</th>
		</tr>		<?php $_from = $this->_tpl_vars['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
		<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
			<td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
			<td><a href="info.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['namepl']; ?>
</a></td>
			<td><a href="info.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['nameen']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['v']['country']; ?>
</td>
			<td><?php echo $this->_tpl_vars['v']['gps_width_txt']; ?>
 <?php echo $this->_tpl_vars['v']['gps_height_txt']; ?>
</td>
							<td><select style="width:40px" name="ranga[<?php echo $this->_tpl_vars['v']['id']; ?>
]">
			<option value="1" <?php if ($this->_tpl_vars['v']['ranga'] == '1'): ?>selected<?php endif; ?>>1</option>
			<option value="2" <?php if ($this->_tpl_vars['v']['ranga'] == '2'): ?>selected<?php endif; ?>>2</option>
			<option value="3" <?php if ($this->_tpl_vars['v']['ranga'] == '3'): ?>selected<?php endif; ?>>3</option>
			<option value="4" <?php if ($this->_tpl_vars['v']['ranga'] == '4'): ?>selected<?php endif; ?>>4</option>
			<option value="5" <?php if ($this->_tpl_vars['v']['ranga'] == '5'): ?>selected<?php endif; ?>>5</option>
			</select></td>
			<td><input value="1" type="checkbox" name="donagraniapl[<?php echo $this->_tpl_vars['v']['id']; ?>
]" <?php if ($this->_tpl_vars['v']['donagraniapl'] == '1'): ?>checked<?php endif; ?>> do nagrania PL<br />
			<input value="1" type="checkbox" name="donagraniaen[<?php echo $this->_tpl_vars['v']['id']; ?>
]" <?php if ($this->_tpl_vars['v']['donagraniaen'] == '1'): ?>checked<?php endif; ?>> do nagrania EN
			<br /><input value="1" name="nagranepl[<?php echo $this->_tpl_vars['v']['id']; ?>
]" type="checkbox" <?php if ($this->_tpl_vars['v']['nagranepl'] == '1'): ?>checked<?php endif; ?>> nagrane PL
			<br /><input value="1" name="nagraneen[<?php echo $this->_tpl_vars['v']['id']; ?>
]" type="checkbox" <?php if ($this->_tpl_vars['v']['nagraneen'] == '1'): ?>checked<?php endif; ?>> nagrane EN<br /></td>
			<td><a href="null_edit_atr.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edycja</a> <?php if ($this->_tpl_vars['v']['count_edit'] != '0'): ?>(<?php echo $this->_tpl_vars['v']['count_edit']; ?>
) <?php echo $this->_tpl_vars['v']['date_edit']; ?>
<?php endif; ?><br /><a href="null_atr.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
" onclick="return confirm('Czy napewno wykonać tę operacje?')">Usuń</a></td>
		</tr>			<?php endforeach; endif; unset($_from); ?>		</table><br />


	</div>
			</form>
			
			<div class="panel-bottom">
				<ul class="bottom-links to-left">
					<li class="icon1"><a href="post_edit.php">Edycja przykładowych rekordów</a></li>
					<li class="icon2"><a href="post2.php">Aktywowanie, przeniesienie<br />użytkownika na nowe urządzeniu. </a></li>
					<li class="icon3"><a href="post3.php">Logowanie </a></li>
					<li class="icon4"><a href="search2.php">Zapytania o POI </a></li>
					<li class="icon5"><a href="search_id.php">Szukanie ID</a></li>
					<li class="icon6"><a href="post5.php">Przedłużanie abonamentu</a></li>
					<li class="icon7"><a href="post1.php">Wygenerowanie identyfikatora </a></li>
					<li><a href="search_nokia.php">POST NOKIA</a></li>
				</ul>
				<ul class="navigator">
			<?php echo $this->_tpl_vars['renderPager']; ?>

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

	