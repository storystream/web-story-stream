<?php

function smarty_modifier_count_atr($string)
{
echo MysqlGetOne("SELECT COUNT(id) FROM `geodata` WHERE city_id ='".$string."' AND type!='city' " );
}

/* vim: set expandtab: */

?>
