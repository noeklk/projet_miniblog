<?php

/*
 * Squelette : ../prive/squelettes/contenu/admin_vider.html
 * Date :      Wed, 14 Mar 2018 16:27:19 GMT
 * Compile :   Fri, 26 Oct 2018 13:36:32 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/contenu/admin_vider.html
// Temps de compilation total: 0.425 ms
//

function html_e9ef826081ede3f86671a06f6f2667ac($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
invalideur_session($Cache, sinon_interdire_acces(((function_exists("autoriser")||include_spip("inc/autoriser"))&&autoriser('configurer', '_admin_vider')?" ":""))) .
'

<h1 class="grostitre">' .
_T('public|spip|ecrire:texte_vider_cache') .
'</h1>

<p>' .
_T('public|spip|ecrire:texte_suppression_fichiers') .
'</p>
<p>' .
_T('public|spip|ecrire:texte_recalcul_page') .
'</p>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/inclure/admin_vider_cache') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/contenu/admin_vider.html\',\'html_e9ef826081ede3f86671a06f6f2667ac\',\'\',8,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>

' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/inclure/admin_vider_images') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/contenu/admin_vider.html\',\'html_e9ef826081ede3f86671a06f6f2667ac\',\'\',10,$GLOBALS[\'spip_lang\']),\'ajax\' => ($v=( ' . argumenter_squelette(@$Pile[0]['ajax']) . '))?$v:true), _request("connect"));
?'.'>
');

	return analyse_resultat_skel('html_e9ef826081ede3f86671a06f6f2667ac', $Cache, $page, '../prive/squelettes/contenu/admin_vider.html');
}
?>