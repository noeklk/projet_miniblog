<?php
// This is a SPIP language file  --  Ceci est un fichier langue de SPIP
// extrait automatiquement de https://trad.spip.net/tradlang_module/sites?lang_cible=oc_va
// ** ne pas modifier le fichier **

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

$GLOBALS[$GLOBALS['idx_lang']] = array(

	// A
	'avis_echec_syndication_01' => 'La sindicacion a mau capitat: lo backend indicat es indeschifrable o prepausa ges d’article.',
	'avis_echec_syndication_02' => 'La sindicacion a mau capitat: impossible d’accedir vèrs lo backend d’aqueu sit.',
	'avis_site_introuvable' => 'Sit introbable',
	'avis_site_syndique_probleme' => 'Atencion: la sindicacion d’aquel sit a rescontrat un problèma; lo sistèma es doncas interromput temporariament. Verificatz l’adreiça dau fichier de sindicacion d’aquel sit (<b>@url_syndic@</b>), e tornatz assajar de recuperar las informacions.', # MODIF
	'avis_sites_probleme_syndication' => 'Aqueles sits an rescontrat un problèma de sindicacion',
	'avis_sites_syndiques_probleme' => 'Aqueles sits sindicats an pausat un problèma',

	// B
	'bouton_radio_modere_posteriori' => 'moderat a posteriòri', # MODIF
	'bouton_radio_modere_priori' => 'moderat a priòri', # MODIF
	'bouton_radio_non_syndication' => 'Ges de sindicacion',
	'bouton_radio_syndication' => 'Sindicacion:',

	// E
	'entree_adresse_fichier_syndication' => 'Adreiça dau fichier "backend" per la sindicacion:',
	'entree_adresse_site' => '<b>Adreiça dau sit</b> [Obligatòria]',
	'entree_description_site' => 'Descripcion dau sit',

	// F
	'form_prop_nom_site' => 'Nom dau sit',

	// I
	'icone_modifier_site' => 'Modificar aquel sit',
	'icone_referencer_nouveau_site' => 'Referenciar un sit nòu',
	'icone_voir_sites_references' => 'Veire los sits referenciats',
	'info_1_site' => '1 sit',
	'info_a_valider' => '[de validar]',
	'info_bloquer' => 'blocar',
	'info_bloquer_lien' => 'Blocar aqueu liam',
	'info_derniere_syndication' => 'La darriera sindicacion d’aqueu sit se faguèc lo',
	'info_liens_syndiques_1' => 'liams sindicats',
	'info_liens_syndiques_2' => 'son en espèra de validacion.',
	'info_nom_site_2' => '<b>Nom dau sit</b> [Obligatòri]',
	'info_panne_site_syndique' => 'Sit sindicat en pana',
	'info_probleme_grave' => 'problèma de',
	'info_question_proposer_site' => 'Cu pòt prepausar de sits referenciats?',
	'info_retablir_lien' => 'Restablir aqueu liam',
	'info_site_attente' => 'Sit web en espèra de validacion',
	'info_site_propose' => 'Sit prepausat lo:',
	'info_site_reference' => 'Sit referenciat en linha',
	'info_site_refuse' => 'Sit web refusat',
	'info_site_syndique' => 'Aquel sit es sindicat...', # MODIF
	'info_site_valider' => 'Sits de validar',
	'info_sites_referencer' => 'Referenciar un sit',
	'info_sites_refuses' => 'Los sits refusats',
	'info_statut_site_1' => 'Aquel sit es:',
	'info_statut_site_2' => 'Publicat',
	'info_statut_site_3' => 'Prepausat',
	'info_statut_site_4' => 'Au bordilhier', # MODIF
	'info_syndication' => 'sindicacion:',
	'info_syndication_articles' => 'article(s)',
	'item_bloquer_liens_syndiques' => 'Blocar los liams sindicats per validacion',
	'item_gerer_annuaire_site_web' => 'Gerir un annuari de sits web',
	'item_non_bloquer_liens_syndiques' => 'Pas blocar los liams eissits de la sindicacion',
	'item_non_gerer_annuaire_site_web' => 'Desactivar l’annuari de sits web',
	'item_non_utiliser_syndication' => 'Pas utilizar la sindicacion automatica',
	'item_utiliser_syndication' => 'Utilizar la sindicacion automatica',

	// L
	'lien_mise_a_jour_syndication' => 'Actualizar aüra',
	'lien_nouvelle_recuperation' => 'Assajar una novèla recuperacion de las donaas',

	// S
	'syndic_choix_moderation' => 'Que se pòt far amb los liams venents que provenon d’aquel sit?',
	'syndic_choix_oublier' => 'Que se pòt far amb los liams que figuran pas pus dins lo fichier de sindicacion?',
	'syndic_lien_obsolete' => 'liam obsolet',
	'syndic_option_miroir' => 'los blocar sus lo còp',
	'syndic_option_oubli' => 'los esfaçar (après @mois@ mois)',
	'syndic_options' => 'Opcions de sindicacion:',

	// T
	'texte_liens_sites_syndiques' => 'Los liams eissits dels sits sindicats se pòon
   blocar a priòri; lo reglatge
  çai sos indica lo reglatge predefinit dels
   sits sindicats après lor creacion. Coma que siá,
    es possible puei de 
   desblocar chasque liam individualament, o de
   chausir, sit per sit, de blocar los liams aveniors.', # MODIF
	'texte_messages_publics' => 'Messatges publics de l’article:',
	'texte_non_fonction_referencement' => 'Poètz chausir de pas utilizar aquela foncion automatica, e indicar per vòstre franc voler los elements que pertòchan aqueu sit...', # MODIF
	'texte_referencement_automatique' => '<b>Referenciament automatizat d’un sit</b><br /> Poètz referenciar lèu-lèu un sit web en indicar çai sos l’adreiça URL desiraa, o l’adreiça de son fichier backend. SPIP agantarà automaticament las informacions que concernisson aqueu sit (títol, descripcion...).', # MODIF
	'texte_syndication' => 'Se pòt recuperar automaticament, quand un sit web o permet, 
  la tiera de sas novetats. Per aquò far, vos chau activar la sindicacion. 
  <blockquote><i>Quauques auberjaors activan pas aquela foncionalitat; 
  en aqueu cas, poiretz pas utilizar la sindicacion de contengut
  dempuei vòstre sit.</i></blockquote>', # MODIF
	'titre_articles_syndiques' => 'Articles sindicats tirats d’aqueu sit',
	'titre_dernier_article_syndique' => 'Darriers articles sindicats',
	'titre_page_sites_tous' => 'Los sits referenciats',
	'titre_referencement_sites' => 'Referenciament de sits e sindicacion',
	'titre_site_numero' => 'SIT NUMÈRO:',
	'titre_sites_proposes' => 'Los sits prepausats',
	'titre_sites_references_rubrique' => 'Los sits referenciats dins aquela rubrica',
	'titre_sites_syndiques' => 'Los sits sindicats',
	'titre_sites_tous' => 'Los sits referenciats',
	'titre_syndication' => 'Sindicacion de sits'
);
