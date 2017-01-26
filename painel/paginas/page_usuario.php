<?php
$sys_opc_editar = 1;
$sys_opc_ativar = 1;
$sys_opc_apagar = 1;
$sys_opc_ordem = 1;
$sys_opc_exibe_menu = 1;
$sys_opc_id_unico = "";
$sys_join = array(
    'id_campus' => 'tbl_campus|id_campus:id',
    'id_curso' => 'tbl_cursos|id_curso:id',
    'id_titulacao' => 'tbl_titulacao|id_marca:id'
);
$thumb_size = array(array(88, 88));
$sys_this_page = "usuario";
$sys_local = "page_" . $sys_this_page . ".php";
$sys_tabela = "tbl_" . $sys_this_page;
$sys_titulo = "Usuários";
include('../configuracoes/page_sys_padrao.php');
