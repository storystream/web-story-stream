<?php

function smarty_modifier_b($string, $id)
{
$name=MysqlGetOne("SELECT Name FROM `Campania` WHERE Id = '".$_GET['FOR']."'");
}

/* vim: set expandtab: */

?>
