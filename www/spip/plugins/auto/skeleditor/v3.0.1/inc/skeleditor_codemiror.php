<?php

/**
 * Génère les appels js ou les css selon $type, correspondants à l'extension du fichier édité
 *
 * @param string $extension
 * @return array
 */
function skeleditor_inline_inc($extension){
	if (!$extension)
		return array("","");

	$dir = _DIR_PLUGIN_SKELEDITOR;
	$css = $js = "";
	switch($extension){
		case 'sh':
		case 'txt':
		case 'nfo':
		case 'log':
		case 'csv':
			$mode = null;
			break;
		case 'as':
		case 'js':
			$mode = array("javascript");
			// autoMatchParens: true
			break;
		case 'css':
		case 'scss':
		case 'less':
			$mode = array("css");
			break;
		case 'xml':
		case 'yaml':
		case 'svg':
		case 'rdf':
			$mode = array("xml");
			#continuousScanning: 500,
			break;
		/*
		case 'sql':
			$parsers = array("../contrib/sql/js/parsesql.js");
			$css = array("css/sqlcolors.css");
			#textWrapping: false,
			break;
		case 'py':
			$parsers = array("../contrib/python/js/parsepython.js");
			$css = array("css/pythoncolors.css");
      #  lineNumbers: true,
      #  textWrapping: false,
      #  indentUnit: 4,
      #  parserConfig: {'pythonVersion': 2, 'strictErrors': true}
			break;
		*/
		case 'php':
		case 'html':
			// $mode = array('htmlmixed','xml');
			// break;
		case 'htm':
		default:
			$mode = array("xml","htmlmixed", "css", "javascript", "clike","php");
			break;
	}

	foreach($mode as $m) {
		$test = $dir."codemirror/mode/$m/$m";
		if (file_exists($f=$test.".css"))
			$css .= "<link rel='stylesheet' href='$f' type='text/css' />\n";
		if (file_exists($f=$test.".js"))
			$js .= "<script src='$f' type='text/javascript'></script>\n";
	}

	return array($css,$js);
}

/**
 * Génère les appels js ou les css necessaire au démarrage de codemirror
 *
 *
 * @return array
 */
function skeleditor_codemirror_boot(){
	$css = $js = "";
	$dir = _DIR_PLUGIN_SKELEDITOR;

	lire_fichier(find_in_path('javascript/codemirror.addons.json'),$json);
	$assets = json_decode($json, true);

	// Charger la lib
	$css .= "<link rel='stylesheet' href='".$dir."codemirror/lib/codemirror.css' type='text/css' />\n";
	$js .= "<script src='".$dir."codemirror/lib/codemirror.js' type='text/javascript'></script>\n";

	// Charger le/les themes
	foreach($assets['themes'] as $theme) {
		if(file_exists($f= $dir."codemirror/theme/".$theme.".css"))
    	$css .= "<link rel='stylesheet' href='".$f."' type='text/css' />\n";
	}

	// Charger les addons
	foreach($assets['extensions'] as $ext){
		if(file_exists($e= find_in_path($ext.".js")))
			$js .= "<script src='".$e."' type='text/javascript'></script>\n";
	}

	// Charger les addons
	foreach($assets['addons'] as $addon){
		if(file_exists($s= $dir."codemirror/addon/".$addon.".css"))
			$css .= "<link rel='stylesheet' href='".$s."' type='text/css' />\n";
		if(file_exists($j= $dir."codemirror/addon/".$addon.".js"))
			$js .= "<script src='".$j."' type='text/javascript'></script>\n";
	}

	// Surcharger si besoin
	$css 	.= "<link rel='stylesheet' href='".find_in_path('css/skeleditor.css')."' type='text/css' />\n";

	return array($css,$js);
}
/**
 * Détermine le mime_type pour le mode de codemirror à afficher, selon l'extension du nom du fichier edité
 *
 * @param string $extension
 * @return string
 */
function skeleditor_codemirror_determine_mode($extension) {
	$mode = "";
  $modes = array(
		'txt' => 'text/plain',
		'htm' => 'text/html',
		'html' => 'text/html',
		'php' => 'application/x-httpd-php',
		'css' => 'text/css',
		'scss' => 'text/x-scss',
		'js' => 'javascript', //codemirror2 ne doit pas avoir de mode d�finit pour les js
		'json' => 'application/json',
		'xml' => 'application/xml',
	);
	if (array_key_exists($extension, $modes)) {
		$mode = $modes[$extension];
	}
	return $mode;
}

/**
 * Génère le script d'appel de codemirror
 *
 * @param string $filename
 * @param bool $editable
 * @return string
 */
function skeleditor_codemirror($filename,$editable=true){
	if (!$filename)
		return "";

	$infos = pathinfo($filename);
	list($corecss,$corejs) = skeleditor_codemirror_boot();

	list($modecss,$modejs) = skeleditor_inline_inc($infos['extension']);

	$mode = skeleditor_codemirror_determine_mode($infos['extension']);
	$script =
    '<script type="text/javascript">var cm_mode="'.$mode.'";</script>'
		. $corecss
		. $modecss
		. $corejs
		. $modejs
		. "<script src='".find_in_path("javascript/codemirror_init.js")."' type='text/javascript'></script>\n";

	// compresser le tout si possible !
	if (include_spip('compresseur_fonctions')
		AND function_exists('compacte_head'))
		$script = compacte_head($script);

	return $script;
}
