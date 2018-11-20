<?php

/*
 * Squelette : ../plugins/auto/skeleditor/v3.0.1/formulaires/editer_squelette.html
 * Date :      Fri, 03 Nov 2017 15:18:36 GMT
 * Compile :   Fri, 26 Oct 2018 13:30:21 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/skeleditor/v3.0.1/formulaires/editer_squelette.html
// Temps de compilation total: 6.191 ms
//

function html_51d92a64bc0d463d6f823e6b2d5c5f73($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'formulaire_spip formulaire_editer formulaire_squelette formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'\'>
	' .
(($t1 = strval(table_valeur(@$Pile[0], (string)'message_ok', null)))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok" onclick="jQuery(this).hide(\'fast\');">' . $t1 . '</p>') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'message_erreur', null))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
	<div class="actions">
		<div class="context">
		' .
(($t1 = strval(interdire_scripts((((((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?'' :' ')) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))) ?' ' :''))))!=='' ?
		($t1 . (	'
			' .
	bouton_action(concat(liens_absolus(filtre_balise_img_dist(find_in_path('images/se-file-copy-16.png'),'copy')),' ',_T('skeleditor:personaliser')),invalideur_session($Cache, generer_action_auteur('skeleditor_new_from',interdire_scripts(invalideur_session($Cache, entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true))),invalideur_session($Cache, parametre_url(self(),'f',''))))) .
	'
		')) :
		'') .
'
		' .
(($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('download', 'squelette', interdire_scripts(invalideur_session($Cache, entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true))))?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
			' .
	bouton_action(concat(liens_absolus(filtre_balise_img_dist(find_in_path('images/se-download-16.png'),'download')),' ',_T('skeleditor:action_download')),invalideur_session($Cache, generer_action_auteur('skeleditor_dl',interdire_scripts(invalideur_session($Cache, entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))))) .
	'
		')) :
		'') .
'
		' .
(($t1 = strval(invalideur_session($Cache, ((((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('supprimer', 'squelette', interdire_scripts(invalideur_session($Cache, entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true))))?" ":"")) ?' ' :''))))!=='' ?
		($t1 . (	'
			' .
	bouton_action(concat(liens_absolus(filtre_balise_img_dist(find_in_path('images/se-file-delete-16.png'),'delete')),' ',_T('skeleditor:action_supprimer')),invalideur_session($Cache, generer_action_auteur('skeleditor_delete',interdire_scripts(invalideur_session($Cache, entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true))),invalideur_session($Cache, parametre_url(self(),'f','')))),'',_T('skeleditor:effacer_confirme')) .
	'
		')) :
		'') .
'
		</div>
	</div>
	' .
vide($Pile['vars'][$_zzz=(string)'masque'] = interdire_scripts(((((((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))) ?' ' :'')) AND (((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'filename')) ?'' :' '))) ?' ' :''))) .
((table_valeur($Pile["vars"], (string)'masque', null))  ?
		(' ' . (	'
	<div class="rename">
	' .
	(($t2 = strval(interdire_scripts(substr(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true),interdire_scripts(strlen(eval('return '.'_DIR_RACINE'.';')))))))!=='' ?
			('<span class="filepath">' . $t2 . '</span>') :
			'') .
	'
	<a href="#" onclick="jQuery(this).hide(\'fast\').parent().siblings(\'form\').find(\'.renommer\').show(\'fast\');return false;">Renommer</a>
	' .
	(($t2 = strval(interdire_scripts(table_valeur(@$Pile[0], (string)'_info_copie', null))))!=='' ?
			('<div>' . $t2 . '</div>') :
			'') .
	'
	</div>
	')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . (	'
		' .
	(($t2 = strval(interdire_scripts(((((((entites_html(table_valeur(@$Pile[0], (string)'type', null),true) == 'txt')) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
		<button type="button" onclick="search()">' .
		_T('skeleditor:rechercher') .
		'</button> 
		<input type="text" style="width: 5em" id="query" value=""> ' .
		_T('skeleditor:rechercher_ou_remplacer') .
		'
		<button type="button" onclick="replace()">' .
		_T('skeleditor:remplacer') .
		'</button> ' .
		_T('skeleditor:remplacer_par') .
		'
		<input type="text" style="width: 5em" id="replace" /> 		
		')) :
			'') .
	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true)) .
	'\' enctype=\'multipart/form-data\'><div>
		
		' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'action', null),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(!empty($Pile[0]['_hidden']) ? @$Pile[0]['_hidden'] : '') .
	'</div><div class="renommer"' .
	((table_valeur($Pile["vars"], (string)'masque', null))  ?
			(' ' . ' ' . 'style=\'display:none;\'') :
			'') .
	'>
			<ul >
				<li class="editer_filename' .
	((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'filename'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
					<label for="filename">' .
	interdire_scripts((entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true) ? _T('skeleditor:label_renommer_fichier'):_T('skeleditor:label_nouveau_fichier'))) .
	'</label>' .
	(($t2 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'filename')))!=='' ?
			('
					<span class=\'erreur_message\'>' . $t2 . '</span>') :
			'') .
	'
					<input type="text" name=\'filename\' class=\'text\' id=\'filename\' value="' .
	interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'filename', null),true)) .
	'" />
					<p class="explication">' .
	_T('skeleditor:explications_filename_fichier_chemin') .
	'</p>
				</li>
			</ul>
			<p class="boutons"><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public|spip|ecrire:bouton_enregistrer') .
	'\' /></p>
		</div>
			' .
	(($t2 = strval(interdire_scripts(((((((entites_html(table_valeur(@$Pile[0], (string)'type', null),true) == 'txt')) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
	  <ul>
	    <li class="editer_texte editer_code' .
		((table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'code'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<em class="infos">' .
		(($t3 = strval(interdire_scripts(affdate(entites_html(table_valeur(@$Pile[0], (string)'date', null),true)))))!=='' ?
				($t3 . (	(($t4 = strval(interdire_scripts(heures(entites_html(table_valeur(@$Pile[0], (string)'date', null),true)))))!=='' ?
					(' ' . $t4 . 'h') :
					'') .
			interdire_scripts(minutes(entites_html(table_valeur(@$Pile[0], (string)'date', null),true))) .
			(($t4 = strval(interdire_scripts(taille_en_octets(entites_html(table_valeur(@$Pile[0], (string)'size', null),true)))))!=='' ?
					('- ' . $t4 . ' ') :
					''))) :
				'') .
		'</em>
				<label for="text_area">' .
		_T('skeleditor:label_code') .
		'</label>' .
		(($t3 = strval(table_valeur(table_valeur(@$Pile[0], (string)'erreurs', null),'code')))!=='' ?
				('
				<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
				<div class="codewrap' .
		(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?'' :' '))))!=='' ?
				(' ' . $t3 . 'readonly') :
				'') .
		'"><textarea' .
		(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?'' :' '))))!=='' ?
				(' ' . $t3 . 'readonly=\'readonly\'') :
				'') .
		' name=\'code\' class=\'no_barre' .
		(($t3 = strval(interdire_scripts(((entites_html(table_valeur(@$Pile[0], (string)'editable', null),true)) ?'' :' '))))!=='' ?
				(' ' . $t3 . 'readonly') :
				'') .
		'\' id=\'code\' cols=\'80\' rows=\'50\'>' .
		table_valeur(@$Pile[0], (string)'code', null) .
		'</textarea></div>
	    </li>
	  </ul>
			')) :
			'') .
	'
	  
	  <!--extra-->
		' .
	(($t2 = strval(interdire_scripts(((((((entites_html(table_valeur(@$Pile[0], (string)'type', null),true) == 'txt')) AND (interdire_scripts(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true)))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
	  <p class="boutons"><input type=\'submit\' class=\'submit\' value=\'' .
		_T('public|spip|ecrire:bouton_enregistrer') .
		'\' /></p>
		')) :
			'') .
	'
	</div></form>
	')) :
		'') .
'
	' .
(($t1 = strval(interdire_scripts((((entites_html(table_valeur(@$Pile[0], (string)'type', null),true) == 'img')) ?' ' :''))))!=='' ?
		($t1 . (	'
		<em class="infos">' .
	(($t2 = strval(interdire_scripts(affdate(entites_html(table_valeur(@$Pile[0], (string)'date', null),true)))))!=='' ?
			($t2 . ' ') :
			'') .
	(($t2 = strval(interdire_scripts(taille_en_octets(entites_html(table_valeur(@$Pile[0], (string)'size', null),true)))))!=='' ?
			('- ' . $t2 . ' ') :
			'') .
	'</em>
		' .
	interdire_scripts(filtre_balise_img_dist(entites_html(table_valeur(@$Pile[0], (string)'fichier', null),true))) .
	'
	')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_51d92a64bc0d463d6f823e6b2d5c5f73', $Cache, $page, '../plugins/auto/skeleditor/v3.0.1/formulaires/editer_squelette.html');
}
?>