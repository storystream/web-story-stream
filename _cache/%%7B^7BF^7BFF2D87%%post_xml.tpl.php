<?php /* Smarty version 2.6.21, created on 2012-11-17 01:32:40
         compiled from boxes/post_xml.tpl */ ?>
<xml>
<art_list>
<date><?php echo $this->_tpl_vars['data_art']; ?>
</date>
	<?php $_from = $this->_tpl_vars['art']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['c'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['c']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['c']['iteration']++;
?>	
		<art>
			<id><?php echo $this->_tpl_vars['v']['id']; ?>
</id>
			<category_pl><?php echo $this->_tpl_vars['v']['category_name_pl']; ?>
</category_pl>
			<category_en><?php echo $this->_tpl_vars['v']['category_name_en']; ?>
</category_en>
			<author_pl><?php echo $this->_tpl_vars['v']['author_name_pl']; ?>
</author_pl>
			<author_en><?php echo $this->_tpl_vars['v']['author_name_en']; ?>
</author_en>
			<author_img><?php echo $this->_tpl_vars['v']['author_img']; ?>
</author_img>
			<author_name_orginal><?php echo $this->_tpl_vars['v']['author_name_orginal']; ?>
</author_name_orginal>
			<author_html_pl><![CDATA[ <?php echo $this->_tpl_vars['v']['author_html_pl']; ?>
]]></author_html_pl>
			<author_html_en><![CDATA[ <?php echo $this->_tpl_vars['v']['author_html_en']; ?>
]]></author_html_en>
			<location_pl><?php echo $this->_tpl_vars['v']['location_name_pl']; ?>
</location_pl>
			<location_en><?php echo $this->_tpl_vars['v']['location_name_en']; ?>
</location_en>
			<name><?php echo $this->_tpl_vars['v']['name']; ?>
</name>
			<name_help_pl><?php echo $this->_tpl_vars['v']['name_help_pl']; ?>
</name_help_pl>
			<name_help_en><?php echo $this->_tpl_vars['v']['name_help_en']; ?>
</name_help_en>
			<name_orginal_en><?php echo $this->_tpl_vars['v']['name_orginal_en']; ?>
</name_orginal_en>
			<name_orginal_en><?php echo $this->_tpl_vars['v']['name_orginal_en']; ?>
</name_orginal_en>
			<catalog><?php echo $this->_tpl_vars['v']['catalog']; ?>
</catalog>
			<img><?php echo $this->_tpl_vars['v']['img']; ?>
</img>
			<img_sk><?php echo $this->_tpl_vars['v']['img_sk']; ?>
</img_sk>
			<min_img_sk><?php echo $this->_tpl_vars['v']['min_img_sk']; ?>
</min_img_sk>
			<img1><?php echo $this->_tpl_vars['v']['img1']; ?>
</img1>
			<img2><?php echo $this->_tpl_vars['v']['img2']; ?>
</img2>
			<img3><?php echo $this->_tpl_vars['v']['img3']; ?>
</img3>
			<img4><?php echo $this->_tpl_vars['v']['img4']; ?>
</img4>
			<img5><?php echo $this->_tpl_vars['v']['img5']; ?>
</img5>
			<img_map><?php echo $this->_tpl_vars['v']['img_map']; ?>
</img_map>
			<title_pl><?php echo $this->_tpl_vars['v']['title_pl']; ?>
</title_pl>
			<title_en><?php echo $this->_tpl_vars['v']['title_en']; ?>
</title_en>
			<data_powstania_pl><?php echo $this->_tpl_vars['v']['data_powstania_pl']; ?>
</data_powstania_pl>
			<data_powstania_en><?php echo $this->_tpl_vars['v']['data_powstania_en']; ?>
</data_powstania_en>
			<miejsce_pl><?php echo $this->_tpl_vars['v']['miejsce_pl']; ?>
</miejsce_pl>
			<miejsce_en><?php echo $this->_tpl_vars['v']['miejsce_en']; ?>
</miejsce_en>
			<html_pl><![CDATA[ <?php echo $this->_tpl_vars['v']['html_pl']; ?>
 ]]></html_pl>
			<html_en><![CDATA[ <?php echo $this->_tpl_vars['v']['html_en']; ?>
 ]]></html_en>
			<min_html_pl><?php echo $this->_tpl_vars['v']['min_html_pl']; ?>
</min_html_pl>
			<min_html_en><?php echo $this->_tpl_vars['v']['min_html_en']; ?>
</min_html_en>
			<technika_pl><?php echo $this->_tpl_vars['v']['technika_pl']; ?>
</technika_pl>
			<technika_en><?php echo $this->_tpl_vars['v']['technika_en']; ?>
</technika_en>
			<wymiary_pl><?php echo $this->_tpl_vars['v']['wymiary_pl']; ?>
</wymiary_pl>
			<wymiary_en><?php echo $this->_tpl_vars['v']['wymiary_en']; ?>
</wymiary_en>
			<materialy_pl><?php echo $this->_tpl_vars['v']['materialy_pl']; ?>
</materialy_pl>
			<materialy_en><?php echo $this->_tpl_vars['v']['materialy_en']; ?>
</materialy_en>
			<mp3_pl><?php echo $this->_tpl_vars['v']['mp3_pl']; ?>
</mp3_pl>
			<mp3_en><?php echo $this->_tpl_vars['v']['mp3_en']; ?>
</mp3_en>
		</art>
	<?php endforeach; endif; unset($_from); ?>
</art_list>
</xml>

