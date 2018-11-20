<?php

/*
 * Squelette : ../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html
 * Date :      Wed, 14 Mar 2018 16:27:59 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:42 GMT
 * Boucles :   _annonces, _pb, _rv
 */ 

function BOUCLE_annonceshtml_8ceba977d4dd16a20e3915e7e9f49f5f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'messages';
		$command['id'] = '_annonces';
		$command['from'] = array('messages' => 'spip_messages');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("messages.date_heure",
		"messages.type",
		"messages.id_message");
		$command['orderby'] = array();
		$command['where'] = 
			array(
quete_condition_statut('messages.statut','!','publie',''), 
			array('=', 'messages.type', "'affich'"), 
			array('NOT', 
			array('=', 'messages.rv', "'oui'")));
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+(float)microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_annonces',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<li class="item' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['date_heure'] > interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'last', null),true)))) ?' ' :''))))!=='' ?
		(' ' . $t1 . ' nouveau') :
		'') .
' message message-' .
interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0])) .
'">
		' .
recuperer_fond( 'prive/squelettes/inclure/organiseur-message' , array('id_message' => $Pile[$SP]['id_message'] ), array('compil'=>array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_annonces',6,$GLOBALS['spip_lang'])), _request('connect')) .
'</li>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+(float)microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annonces @ ../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_pbhtml_8ceba977d4dd16a20e3915e7e9f49f5f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'messages';
		$command['id'] = '_pb';
		$command['from'] = array('messages' => 'spip_messages');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("messages.date_heure",
		"messages.type",
		"messages.id_message");
		$command['orderby'] = array();
		$command['join'] = array();
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('messages.statut','!','publie',''), 
			array('=', 'messages.id_auteur', sql_quote(@$Pile[0]['id_auteur'], '','bigint(21) NOT NULL DEFAULT \'0\'')), 
			array('=', 'messages.type', "'pb'"), 
			array('NOT', 
			array('=', 'messages.rv', "'oui'")));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+(float)microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_pb',14,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<li class="item' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['date_heure'] > interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'last', null),true)))) ?' ' :''))))!=='' ?
		(' ' . $t1 . ' nouveau') :
		'') .
' message message-' .
interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0])) .
'">
		' .
recuperer_fond( 'prive/squelettes/inclure/organiseur-message' , array('id_message' => $Pile[$SP]['id_message'] ), array('compil'=>array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_pb',19,$GLOBALS['spip_lang'])), _request('connect')) .
'</li>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+(float)microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_pb @ ../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}


function BOUCLE_rvhtml_8ceba977d4dd16a20e3915e7e9f49f5f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'messages';
		$command['id'] = '_rv';
		$command['from'] = array('messages' => 'spip_messages','auteurs_liens' => 'spip_auteurs_liens');
		$command['type'] = array('auteurs_liens' => 'LEFT');
		$command['groupby'] = array();
		$command['select'] = array("messages.date_heure",
		"messages.type",
		"messages.id_message");
		$command['orderby'] = array('messages.date_heure');
		$command['limit'] = '';
		$command['having'] = 
			array();
	}
	$command['where'] = 
			array(
quete_condition_statut('messages.statut','!','publie',''), 
			array('OR', 
			array('AND', 
			array('!=', 'messages.id_auteur', intval(interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null))))), 
			array('AND', 
			array('=', 'auteurs_liens.id_auteur', intval(interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null))))), 
			array('!=', 'auteurs_liens.vu', '\'poub\''))), 
			array('OR', 
			array('=', 'messages.type', sql_quote('affich')), 
			array('AND', 
			array('=', 'messages.type', sql_quote('pb')), 
			array('=', 'messages.id_auteur', intval(interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null)))))))), 
			array('=', 'messages.rv', "'oui'"), 
			array('>=', 'messages.date_fin', sql_quote(interdire_scripts(affdate(entites_html(table_valeur(@$Pile[0], (string)'date', null),true),'Y-m-d')))));
	$command['join'] = array('auteurs_liens' => array('messages','id_objet','id_message','auteurs_liens.objet=\'message\' AND auteurs_liens.id_auteur='.intval(interdire_scripts(invalideur_session($Cache, table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null))))));
	if (defined("_BOUCLE_PROFILER")) $timer = time()+(float)microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_rv',26,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$t0 .= (
'
	<li class="item' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['date_heure'] > interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'last', null),true)))) ?' ' :''))))!=='' ?
		(' ' . $t1 . ' nouveau') :
		'') .
' message message-' .
interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect, $Pile[0])) .
'">
		' .
recuperer_fond( 'prive/squelettes/inclure/organiseur-message' , array('id_message' => $Pile[$SP]['id_message'] ), array('compil'=>array('../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html','html_8ceba977d4dd16a20e3915e7e9f49f5f','_rv',31,$GLOBALS['spip_lang'])), _request('connect')) .
'</li>
');
	}
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+(float)microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_rv @ ../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette ../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html
// Temps de compilation total: 6.296 ms
//

function html_8ceba977d4dd16a20e3915e7e9f49f5f($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_annonceshtml_8ceba977d4dd16a20e3915e7e9f49f5f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		boite_ouvrir(interdire_scripts(concat(filtre_balise_img_dist(chemin_image('annonce-24.png'),'','cadre-icone'),_T('public|spip|ecrire:info_annonces_generales'))), 'simple') .
		'
<ul class="liste-items messages pensebetes">
') . $t1 . (	'
</ul>
' .
		boite_fermer() .
		'
')) :
		'') .
'


' .
(($t1 = BOUCLE_pbhtml_8ceba977d4dd16a20e3915e7e9f49f5f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		boite_ouvrir(interdire_scripts(concat(filtre_balise_img_dist(chemin_image('pensebete-24.png'),'','cadre-icone'),_T('public|spip|ecrire:infos_vos_pense_bete'))), 'note') .
		'
<ul class="liste-items messages pensebetes">
') . $t1 . (	'
</ul>
' .
		boite_fermer() .
		'
')) :
		'') .
'

' .
(($t1 = BOUCLE_rvhtml_8ceba977d4dd16a20e3915e7e9f49f5f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		boite_ouvrir(interdire_scripts(concat(filtre_balise_img_dist(chemin_image('heure-24.png'),'','cadre-icone'),_T('public|spip|ecrire:info_vos_rendez_vous'))), 'important') .
		'
<ul class="liste-items messages rv">
') . $t1 . (	'
</ul>
' .
		boite_fermer() .
		'
')) :
		''));

	return analyse_resultat_skel('html_8ceba977d4dd16a20e3915e7e9f49f5f', $Cache, $page, '../plugins-dist/organiseur/prive/squelettes/inclure/organiseur-rappels.html');
}
?>