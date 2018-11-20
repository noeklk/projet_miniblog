<?php

/*
 * Squelette : squelettes-dist/inclure/footer.html
 * Date :      Wed, 14 Mar 2018 16:27:57 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:27 GMT
 * Boucles :   _annee
 */ 

function BOUCLE_anneehtml_5b1fb83d382675a0886e09ceecd46eb6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $command = array();
	static $connect;
	$command['connect'] = $connect = '';
	if (!isset($command['table'])) {
		$command['table'] = 'articles';
		$command['id'] = '_annee';
		$command['from'] = array('articles' => 'spip_articles');
		$command['type'] = array();
		$command['groupby'] = array();
		$command['select'] = array("articles.date",
		"articles.lang",
		"articles.titre");
		$command['orderby'] = array('articles.date');
		$command['where'] = 
			array(
quete_condition_statut('articles.statut','publie,prop,prepa/auteur','publie',''), 
quete_condition_postdates('articles.date',''));
		$command['join'] = array();
		$command['limit'] = '0,1';
		$command['having'] = 
			array();
	}
	if (defined("_BOUCLE_PROFILER")) $timer = time()+(float)microtime();
	$t0 = "";
	// REQUETE
	$iter = IterFactory::create(
		"SQL",
		$command,
		array('squelettes-dist/inclure/footer.html','html_5b1fb83d382675a0886e09ceecd46eb6','_annee',3,$GLOBALS['spip_lang'])
	);
	if (!$iter->err()) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP]=$iter->fetch()) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = strval(interdire_scripts((((annee(normaliser_date($Pile[$SP]['date'])) != date('Y'))) ?' ' :''))))!=='' ?
		($t1 . interdire_scripts(annee(normaliser_date($Pile[$SP]['date'])))) :
		'');
		lang_select();
	}
	lang_select();
	$iter->free();
	}
	if (defined("_BOUCLE_PROFILER")
	AND 1000*($timer = (time()+(float)microtime())-$timer) > _BOUCLE_PROFILER)
		spip_log(intval(1000*$timer)."ms BOUCLE_annee @ squelettes-dist/inclure/footer.html","profiler"._LOG_AVERTISSEMENT);
	return $t0;
}

//
// Fonction principale du squelette squelettes-dist/inclure/footer.html
// Temps de compilation total: 7.748 ms
//

function html_5b1fb83d382675a0886e09ceecd46eb6($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="footer clearfix">
	<p class="colophon">
		' .
(($t1 = BOUCLE_anneehtml_5b1fb83d382675a0886e09ceecd46eb6($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . ' - ') :
		'') .
(($t1 = strval(interdire_scripts(annee(normaliser_date(@$Pile[0]['date'])))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0])) .
'
		<br /><a rel="contents" href="' .
interdire_scripts(generer_url_public('plan', '')) .
'" class="first">' .
_T('public|spip|ecrire:plan_site') .
'</a>' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null)) ?'' :' ')))))!=='' ?
		('
		' . $t1 . (	' | <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login', ''),'url',self())) .
	'" rel="nofollow" class=\'login_modal\'>' .
	_T('public|spip|ecrire:lien_connecter') .
	'</a>')) :
		'') .
(($t1 = strval(invalideur_session($Cache, ((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('ecrire')?" ":""))))!=='' ?
		('
		' . $t1 . (	'| <a href="' .
	(defined('_DIR_RESTREINT_ABS')?constant('_DIR_RESTREINT_ABS'):'') .
	'">' .
	_T('public|spip|ecrire:espace_prive') .
	'</a>')) :
		'') .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((table_valeur($GLOBALS["visiteur_session"], (string)'id_auteur', null)) ?' ' :'')))))!=='' ?
		('
		' . $t1 . (	' | <a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array(),
	array('squelettes-dist/inclure/footer.html','html_5b1fb83d382675a0886e09ceecd46eb6','',5,$GLOBALS['spip_lang'])) .
	'" rel="nofollow">' .
	_T('public|spip|ecrire:icone_deconnecter') .
	'</a>')) :
		'') .
' | 
		<a rel="nofollow" href="' .
interdire_scripts(generer_url_public('contact', '')) .
'">' .
_T('public|spip|ecrire:contact') .
'</a> |
		<a href="' .
interdire_scripts(generer_url_public('backend', '')) .
'" rel="alternate" title="' .
_T('public|spip|ecrire:syndiquer_site') .
'" class="last">RSS&nbsp;2.0</a>
	</p>
	' .
(($t1 = strval(inserer_attribut(filtre_balise_img_dist(find_in_path('spip.png')),'alt','SPIP')))!=='' ?
		((	'<small class="generator"><a href="https://www.spip.net/" rel="generator" title="' .
	_T('public|spip|ecrire:site_realise_avec_spip') .
	'" class="generator spip_out">') . $t1 . '</a></small>') :
		'') .
'
</div>');

	return analyse_resultat_skel('html_5b1fb83d382675a0886e09ceecd46eb6', $Cache, $page, 'squelettes-dist/inclure/footer.html');
}
?>