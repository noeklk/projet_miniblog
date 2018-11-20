<?php

/*
 * Squelette : squelettes-dist/inclure/head.html
 * Date :      Wed, 14 Mar 2018 16:27:57 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:26 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/inclure/head.html
// Temps de compilation total: 2.645 ms
//

function html_4d9ca10c89b121cfbd7304c35b2d671e($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
<meta name="viewport" content="width=device-width, initial-scale=1" />


' .
(($t1 = strval(interdire_scripts(generer_url_public('backend', ''))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public|spip|ecrire:syndiquer_site') .
	'" href="') . $t1 . '" />') :
		'') .
'

   
' .
(($t1 = strval(direction_css(find_in_path('css/reset.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/clear.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/font.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/links.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/typo.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/media.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/form.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/grid.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/layout.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'


' .
(($t1 = strval(direction_css(find_in_path('css/spip.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
pipeline('insert_head_css','<!-- insert_head_css -->') .
'


' .
(($t1 = strval(direction_css(find_in_path('css/theme.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/variante.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'
' .
(($t1 = strval(direction_css(find_in_path('css/perso.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" />') :
		'') .
'


' .
'<'.'?php header("X-Spip-Filtre: insert_head_css_conditionnel"); ?'.'>'. pipeline('insert_head','<!-- insert_head -->') .
'


' .
(($t1 = strval(find_in_path('js/script.js')))!=='' ?
		('<script src="' . $t1 . '" type="text/javascript"></script>') :
		'') .
'


<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />


' .
(($t1 = strval(find_in_path('favicon.ico')))!=='' ?
		('<link rel="icon" type="image/x-icon" href="' . $t1 . (	'" />
' .
	(($t2 = strval(find_in_path('favicon.ico')))!=='' ?
			('<link rel="shortcut icon" type="image/x-icon" href="' . $t2 . '" />') :
			''))) :
		'') .
'


' .
(($t1 = strval(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'robots', null),true))))!=='' ?
		('<meta name="robots" content="' . $t1 . '" />') :
		'') .
'
');

	return analyse_resultat_skel('html_4d9ca10c89b121cfbd7304c35b2d671e', $Cache, $page, 'squelettes-dist/inclure/head.html');
}
?>