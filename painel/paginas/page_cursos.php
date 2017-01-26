<?php 
$sys_opc_editar = 1;
$sys_opc_ativar = 1;
$sys_opc_apagar = 0;
$sys_opc_ordem = 1;
$sys_opc_exibe_menu = 1;
$sys_opc_id_unico = "";
$sys_join = array('id_cat' => 'tbl_categoria|id_cat:id', 'id_marca' => 'tbl_marca|id_marca:id');
$thumb_size = array(array(88, 88));
$sys_this_page = "cursos";
$sys_local = "page_" . $sys_this_page . ".php";
$sys_tabela = "tbl_" . $sys_this_page;
$sys_titulo = "Cursos";
include('../configuracoes/page_sys_padrao.php');
