<?php

/*
 * Squelette : squelettes-dist/inclure/nav.html
 * Date :      Wed, 14 Mar 2018 16:27:57 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:27 GMT
 * Boucles :   _nav
 */ 

function BOUCLE_navhtml_2d8c5cfd6d5ff8d36e2455c5acc32c01(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'rubriques';
		$command['id'] = '_nav';
		$command['from'] = array('rubriques' => 'spip_rubriques');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
		$command['orderby'] = array('num', 'rubriques.titre');
		$command['where'] = 
			array(
quete_condition_statut('rubriques.statut','!','publie',''), 
			array('=', 'rubriques.id_parent', 0));
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
		array('squelettes-dist/inclure/nav.html','html_2d8c5cfd6d5ff8d36e2455c5acc32c01','_nav',1,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	
	// COMPTEUR
	$Numrows['_nav']['compteur_boucle'] = 0;
	$Numrows['_nav']['total'] = @intval($iter->count());
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		$Numrows['_nav']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
		<li class="nav-item' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' ' . 'on') :
		'') .
((($Numrows['_nav']['compteur_boucle'] == '1'))  ?
		(' ' . ' ' . 'first') :
		'') .
((($Numrows['_nav']['compteur_boucle'] == $Numrows['_nav']['total']))  ?
		(' ' . ' ' . 'last') :
		'') .
'"><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo($Pile[$SP]['titre']), "TYPO", $connect, $Pile[0])) .
'</a></li>
		');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+(float)microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_nav @ squelettes-dist/inclure/nav.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes-dist/inclure/nav.html
// Temps de compilation total: 1.658 ms
//

function html_2d8c5cfd6d5ff8d36e2455c5acc32c01($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_navhtml_2d8c5cfd6d5ff8d36e2455c5acc32c01($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="nav clearfix' .
		((($Numrows['_nav']['total'] == '1'))  ?
				(' ' . ' ' . 'none') :
				'') .
		'" id="nav">
	<ul>
		') . $t1 . '
	</ul>
</div>
') :
		'');

	return analyse_resultat_skel('html_2d8c5cfd6d5ff8d36e2455c5acc32c01', $Cache, $page, 'squelettes-dist/inclure/nav.html');
}
?>