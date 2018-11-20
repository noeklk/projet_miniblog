<?php

/*
 * Squelette : ../plugins-dist/compagnon/compagnon/_boite.html
 * Date :      Wed, 14 Mar 2018 16:27:58 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:42 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/compagnon/compagnon/_boite.html
// Temps de compilation total: 0.826 ms
//

function html_17907b42356116505bad5e6be08c5d5a($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'fermer', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
' .
	boite_ouvrir(interdire_scripts(table_valeur(@$Pile[0], (string)'titre', null)), 'compagnon') .
	interdire_scripts(table_valeur(@$Pile[0], (string)'texte', null)) .
	boite_pied() .
	'
	' .
	(($t2 = strval(interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'target', null), ''),true))))!=='' ?
			('<span class="target" data-target="' . $t2 . '"></span>') :
			'') .
	'
	' .
	bouton_action(filtre_ok_aleatoire_dist(''),invalideur_session($Cache, generer_action_auteur('compagnon',(	'compris/' .
			interdire_scripts(invalideur_session($Cache, @$Pile[0]['id']))),invalideur_session($Cache, parametre_url(self(),'fermer','oui')))),'ajax') .
	'
' .
	boite_fermer() .
	'
')) :
		'') .
'
');

	return analyse_resultat_skel('html_17907b42356116505bad5e6be08c5d5a', $Cache, $page, '../plugins-dist/compagnon/compagnon/_boite.html');
}
?>