<?php

/**
 * @copyright   Copyright (C) 2019-2020 Jeffrey Bostoen
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2020-11-02 19:47:32
 *
 * iTop module definition file
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'jb-crab/2.6.201102',
	array(
		// Identification
		//
		'label' => 'Datamodel: CRAB Management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'jb-framework/2.6.0',
			'jb-map-main/2.6.0'
		),
		'mandatory' => false,
		'visible' => true,

		// Components
		//
		'datamodel' => array(
			'model.jb-crab.php',
			'app/common/crabimporthelper.class.inc.php',
			'app/core/backgroundprocess.class.inc.php',
		),
		'webservice' => array(
			
		),
		'data.struct' => array(
			// add your 'structure' definition XML files here,
		),
		'data.sample' => array(
			// add your sample data XML files here,
		),
		
		// Documentation
		//
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 

		// Default settings
		//
		'settings' => array(
			// Module specific settings go here, if any
			'time' => '00:30',
			'enabled' => true,
			'debug' => 'error',
			'shapefile_query' => 'SELECT * FROM CrabAdr WHERE GEMEENTE = "Izegem" ORDER BY STRAATNM',
		),
	)
);
