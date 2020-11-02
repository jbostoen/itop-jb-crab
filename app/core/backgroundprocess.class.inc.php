<?php

/**
 * @copyright   Copyright (C) 2019-2020 Jeffrey Bostoen
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2020-11-02 19:47:32
 *
 * Definition of ScheduledProcessCrabSync
 */

namespace jb_itop_extensions\crab;

// jb-jb_itop_extensions
use \jb_itop_extensions\components\ScheduledProcess;

// iTop internals
use \CoreUnexpectedValue;
use \iScheduledProcess;
use \MetaModel;
use \utils;

/**
 * Class ScheduledProcessCrabSync
 */
class ScheduledProcessCrabSync extends ScheduledProcess implements iScheduledProcess {
	
	const MODULE_CODE = 'jb-crab';

	/**
	 * Constructor.
	 */
	public function __construct() {
		
		parent::__construct();

	}

	/**
	 * @inheritdoc
	 *
	 * @throws \CoreException
	 * @throws CoreUnexpectedValue
	 * @throws \MissingQueryArgument
	 * @throws \MySQLException
	 * @throws \MySQLHasGoneAwayException
	 * @throws \OQLException
	 */
	public function Process($iTimeLimit) {
		
		// Increase limits, temporarily.
		$iTimeLimit_PHP = ini_get('max_execution_time');
		$iMemoryLimit_PHP = ini_get('memory_limit');
		set_time_limit(0);
		ini_set('memory_limit', -1); // Before: 512M
		
		$this->Trace('Processing Crab...');
		$this->Trace('Disabled max_execution_time and set memory_limit to unlimited');
		
		// Ignore time limit, it should run nightly and it will take some time.
		try {
			
			$sQuery = utils::GetCurrentModuleSetting('shapefile_query', ''); // Example: 'SELECT * FROM CrabAdr WHERE GEMEENTE = "Izegem" ORDER BY STRAATNM'
			
			CrabImportHelper::Init();
			// CrabImportHelper::DownloadShapeFile($this);
			CrabImportHelper::ConvertShapeFileToGeoJSON($this, $sQuery);
			CrabImportHelper::ImportFromGeoJSON($this);			
			
		}
		catch(Exception $e) {
			$this->Trace($e->GetMessage());
		}
		finally {
			
			// Restore limits
			ini_set('max_execution_time', $iTimeLimit_PHP);
			ini_set('memory_limit', $iMemoryLimit_PHP);
			
		}
		
	}
	
}
