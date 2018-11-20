<?php

/*
 * Squelette : squelettes-dist/inclure/header.html
 * Date :      Wed, 14 Mar 2018 16:27:57 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:27 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/inclure/header.html
// Temps de compilation total: 2.012 ms
//

function html_f5cc9f2fdff9fd4e89c036f1c622a217($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="clearfix header">
	' .
interdire_scripts(((entites_html(sinon(table_valeur(@$Pile[0], (string)'home', null), 'non'),true) == 'oui') ? (	'<h1 class="spip_logo_site">' .
	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'224','96')) .
	interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
	'</h1>
	'):(	'<strong class="h1 spip_logo_site"><a rel="start home" href="' .
	spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/" title="' .
	_T('public|spip|ecrire:accueil_site') .
	'">' .
	filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logo spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'224','96')) .
	interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
	'</a></strong>
	'))) .
(($t1 = strval(interdire_scripts(typo($GLOBALS['meta']['slogan_site'], "TYPO", $connect, $Pile[0]))))!=='' ?
		('<p id="slogan">' . $t1 . '</p>') :
		'') .
'
</div>');

	return analyse_resultat_skel('html_f5cc9f2fdff9fd4e89c036f1c622a217', $Cache, $page, 'squelettes-dist/inclure/header.html');
}
?>