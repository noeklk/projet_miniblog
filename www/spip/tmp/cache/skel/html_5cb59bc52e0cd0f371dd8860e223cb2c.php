<?php

/*
 * Squelette : ../prive/themes/spip/grids.css.html
 * Date :      Wed, 14 Mar 2018 16:27:18 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:40 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/themes/spip/grids.css.html
// Temps de compilation total: 0.381 ms
//

function html_5cb59bc52e0cd0f371dd8860e223cb2c($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("X-Spip-Cache: 0"); ?'.'>'.'<'.'?php header("Cache-Control: no-cache, must-revalidate"); ?'.'><'.'?php header("Pragma: no-cache"); ?'.'>
' .
'<'.'?php header("X-Spip-Cache: 360000"); ?'.'>'.'<'.'?php header("Cache-Control: max-age=360000"); ?'.'>'.'<'.'?php header("X-Spip-Statique: oui"); ?'.'>' .
'<'.'?php header(' . _q('Content-Type: text/css; charset=iso-8859-15') . '); ?'.'>' .
'<'.'?php header(' . _q('Vary: Accept-Encoding') . '); ?'.'>/* **************** GRIDS ***************** */
.line, .lastUnit {overflow: hidden;_overflow:visible;_zoom:1; }
.unit{float:' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'left', null),true)) .
';_zoom:1;}
.unitExt{float:' .
interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'right', null),true)) .
';}
.size1of1{float:none;}
.size1of2{width:50%;}
.size1of3{width:33.33333%;}
.size2of3{width:66.66666%;}
.size1of4{width:25%;}
.size3of4{width:75%;}
.size1of5{width:20%;}
.size2of5{width:40%;}
.size3of5{width:60%;}
.size4of5{width:80%;}
.lastUnit {float:none;_position:relative; _left:-3px; _margin-right: -3px;width:auto;}
/* extending grids to allow a unit that takes the width of its content */
.media{width:auto;}');

	return analyse_resultat_skel('html_5cb59bc52e0cd0f371dd8860e223cb2c', $Cache, $page, '../prive/themes/spip/grids.css.html');
}
?>