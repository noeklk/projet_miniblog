<?php

/*
 * Squelette : ../plugins/auto/skeleditor/v3.0.1/prive/style_prive_plugin_skeleditor.html
 * Date :      Fri, 03 Nov 2017 15:18:36 GMT
 * Compile :   Fri, 26 Oct 2018 12:13:41 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/skeleditor/v3.0.1/prive/style_prive_plugin_skeleditor.html
// Temps de compilation total: 1.089 ms
//

function html_9bbbbde83763b27c9cdbdcce4ea5821e($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<'.'?php header("X-Spip-Cache: 360000"); ?'.'>'.'<'.'?php header("Cache-Control: max-age=360000"); ?'.'>'.'<'.'?php header("X-Spip-Statique: oui"); ?'.'>' .
'<'.'?php header(' . _q('Content-Type: text/css; charset=iso-8859-15') . '); ?'.'>' .
'<'.'?php header(' . _q('Vary: Accept-Encoding') . '); ?'.'>' .
vide($Pile['vars'][$_zzz=(string)'claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_claire', null), 'edf3fe'),true)))) .
vide($Pile['vars'][$_zzz=(string)'foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(table_valeur(@$Pile[0], (string)'couleur_foncee', null), '3874b0'),true)))) .
vide($Pile['vars'][$_zzz=(string)'left'] = interdire_scripts(choixsiegal(entites_html(table_valeur(@$Pile[0], (string)'ltr', null),true),'left','left','right'))) .
vide($Pile['vars'][$_zzz=(string)'right'] = interdire_scripts(choixsiegal(entites_html(table_valeur(@$Pile[0], (string)'ltr', null),true),'left','right','left'))) .
'.formulaire_squelette .actions {padding:2px;overflow:hidden;position: absolute;right: 0;top:0;margin-top: -30px;}
.formulaire_squelette .actions .add {float:' .
table_valeur($Pile["vars"], (string)'left', null) .
';}
.formulaire_squelette .actions .context {float:' .
table_valeur($Pile["vars"], (string)'right', null) .
';}
.formulaire_squelette .infos {float:' .
table_valeur($Pile["vars"], (string)'right', null) .
';}
.formulaire_squelette .rename {display:block;padding:2px 4px;}
.formulaire_squelette .rename span {font-weight:bold;}
.formulaire_squelette .rename a {display:block;float:' .
table_valeur($Pile["vars"], (string)'right', null) .
';}
.formulaire_squelette textarea {padding:5px;}
.formulaire_squelette textarea.readonly {background:#eee;color:#666;}

.skeleditor #arbo .dir {
	line-height: 12px;
	border:1px solid #ededed;
	padding:4px;
	margin:4px 0;
}
.skeleditor #arbo .dir.closed { display:none;}

.skeleditor #arbo .fichier {display:block;padding:2px 1px;}
.skeleditor #arbo .on {background-color: #ff6;}
.skeleditor #arbo .readonly {opacity: .4;}

.skeleditor #navigation a.retour {display:block;padding-bottom:3px;}
.skeleditor #navigation a.retour span {font-size:.81em;}

.skeleditor #navigation #arbo .titrem {
	text-align: ' .
table_valeur($Pile["vars"], (string)'left', null) .
';
	margin-bottom: 0;
	padding-top: .2em;
	padding-bottom: .2em;
}
.skeleditor #navigation #arbo .titrem img {float:' .
table_valeur($Pile["vars"], (string)'left', null) .
';margin-' .
table_valeur($Pile["vars"], (string)'right', null) .
':4px;}
');

	return analyse_resultat_skel('html_9bbbbde83763b27c9cdbdcce4ea5821e', $Cache, $page, '../plugins/auto/skeleditor/v3.0.1/prive/style_prive_plugin_skeleditor.html');
}
?>