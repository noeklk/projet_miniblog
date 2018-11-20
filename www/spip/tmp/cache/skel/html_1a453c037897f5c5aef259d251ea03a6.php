<?php

/*
 * Squelette : ../plugins-dist/compagnon/compagnon/accueil.html
 * Date :      Wed, 14 Mar 2018 16:27:58 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:42 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins-dist/compagnon/compagnon/accueil.html
// Temps de compilation total: 1.889 ms
//

function html_1a453c037897f5c5aef259d251ea03a6($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'fermer', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
' .
	vide($Pile['vars'][$_zzz=(string)'titre'] = _T('compagnon:c_accueil_bienvenue',array('nom' => interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'nom', null)))))) .
	'
' .
	boite_ouvrir(table_valeur($Pile["vars"], (string)'titre', null), 'compagnon') .
	'<p>' .
	_T('compagnon:c_accueil_texte') .
	'</p>
<p>' .
	_T('compagnon:c_accueil_texte_revenir') .
	'</p>
' .
	boite_pied() .
	'
	<span class="target" data-target="#bando1_menu_accueil"></span>
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

	return analyse_resultat_skel('html_1a453c037897f5c5aef259d251ea03a6', $Cache, $page, '../plugins-dist/compagnon/compagnon/accueil.html');
}
?>