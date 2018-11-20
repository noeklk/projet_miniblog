<?php

/*
 * Squelette : squelettes-dist/404.html
 * Date :      Wed, 14 Mar 2018 16:27:57 GMT
 * Compile :   Fri, 26 Oct 2018 13:29:31 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/404.html
// Temps de compilation total: 10.690 ms
//

function html_6cf694db84ca88de0a17188a7b72a5bf($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header(' . _q((	'HTTP/1.0  ' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'code', null), '404 Not Found'),true)))) . '); ?'.'>' .
'<'.'?php header(' . _q('Cache-Control: no-store, no-cache, must-revalidate') . '); ?'.'>' .
'<'.'?php header(' . _q('Pragma: no-cache') . '); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie6"> <![endif]-->
<!--[if IE 7 ]> <html dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" class="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
(($t1 = strval(spip_htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		(' ' . $t1) :
		'') .
' no-js"> <!--<![endif]-->
<head>
	<script type=\'text/javascript\'>/*<![CDATA[*/(function(H){H.className=H.className.replace(/\\bno-js\\b/,\'js\')})(document.documentElement);/*]]>*/</script>
	<title>' .
_T('public|spip|ecrire:pass_erreur') .
' ' .
interdire_scripts(textebrut(entites_html(sinon(table_valeur(@$Pile[0], (string)'status', null), '404'),true))) .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect, $Pile[0]))) .
'</title>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/head') . ', array(\'robots\' => ' . argumenter_squelette('none') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_6cf694db84ca88de0a17188a7b72a5bf\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
</head>
<body class="pas_surlignable page_404">
<div class="page">

	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/header') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_6cf694db84ca88de0a17188a7b72a5bf\',\'\',18,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/nav') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes-dist/404.html\',\'html_6cf694db84ca88de0a17188a7b72a5bf\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
	<div class="main">
		<div class="wrapper">
		<div class="content" id="content">
			<p class="arbo"><a href="' .
spip_htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public|spip|ecrire:accueil_site') .
'</a> &gt; <strong class="on">' .
_T('public|spip|ecrire:pass_erreur') .
'</strong></p>
	
			<div class="cartouche">
				<h1>' .
_T('public|spip|ecrire:pass_erreur') .
' ' .
interdire_scripts(intval(entites_html(sinon(table_valeur(@$Pile[0], (string)'status', null), '404'),true))) .
'</h1>
			</div>
			' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'erreur', null),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'article')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('public|spip|ecrire:aucun_article') .
		'</p></div>')) :
			'') .
	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'rubrique')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('public|spip|ecrire:aucune_rubrique') .
		'</p></div>')) :
			'') .
	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'breve')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('public|spip|ecrire:aucune_breve') .
		'</p></div>')) :
			'') .
	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'auteur')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('public|spip|ecrire:aucun_auteur') .
		'</p></div>')) :
			'') .
	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'site')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('public|spip|ecrire:aucun_site') .
		'</p></div>')) :
			'') .
	'
			' .
	(($t2 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'fond_erreur', null),true) == 'forum')) ?' ' :''))))!=='' ?
			($t2 . (	'<div class="chapo"><p>' .
		_T('forum:aucun_message_forum') .
		'</p></div>')) :
			'') .
	'
			')) :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'erreur', null),true))))!=='' ?
		('<div class="chapo"><p>' . $t1 . '</p></div>') :
		'') .
'
	
		</div><!--.content-->
		</div><!--.wrapper-->
	
		<div class="aside">
			' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/navsub') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/404.html\',\'html_6cf694db84ca88de0a17188a7b72a5bf\',\'\',36,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
			' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/404.html','html_6cf694db84ca88de0a17188a7b72a5bf','',37,$GLOBALS['spip_lang'])) .
'
		</div><!--.aside-->
	</div><!--.main-->

	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inclure/footer') . ', array_merge('.var_export($Pile[0],1).',array(\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'squelettes-dist/404.html\',\'html_6cf694db84ca88de0a17188a7b72a5bf\',\'\',41,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--.page-->
</body>
</html>
');

	return analyse_resultat_skel('html_6cf694db84ca88de0a17188a7b72a5bf', $Cache, $page, 'squelettes-dist/404.html');
}
?>