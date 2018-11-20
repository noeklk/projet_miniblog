<?php

/*
 * Squelette : ../prive/squelettes/contenu/navigation.html
 * Date :      Wed, 14 Mar 2018 16:27:19 GMT
 * Compile :   Fri, 26 Oct 2018 13:36:07 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/squelettes/contenu/navigation.html
// Temps de compilation total: 0.197 ms
//

function html_416a2bf54800f63f91a279f874e4de4a($Cache, $Pile, $doublons = array(), $Numrows = array(), $SP = 0) {

	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('prive/squelettes/inclure/menu-navigation') . ', array_merge('.var_export($Pile[0],1).',array(\'menu\' => ' . argumenter_squelette(@$Pile[0]['menu']) . ',
	\'bloc\' => ' . argumenter_squelette('contenu') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'../prive/squelettes/contenu/navigation.html\',\'html_416a2bf54800f63f91a279f874e4de4a\',\'\',1,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
');

	return analyse_resultat_skel('html_416a2bf54800f63f91a279f874e4de4a', $Cache, $page, '../prive/squelettes/contenu/navigation.html');
}
?>