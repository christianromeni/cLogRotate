<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package   cLogRotate 
 * @author    Christian Romeni  <c.romeni@brainfactory.de>
 * @link      https://brainfactory.de
 * @license   GNU 
 * @copyright BrainFactory
 */

/**
* Hooks
*/

$GLOBALS['TL_CRON'][\Config::get('rotation_timespan')][] = array('cLogRotate\cLogRotateHook', 'backupLogAndCleanUp');

/**
* Backend Module
*/

array_insert($GLOBALS['BE_MOD']['system'], 2, array (
	'cLogRotate' => array (
		'callback'  => 'cLogRotateBackEnd',
		'icon'      => 'system/modules/cLogRotate/assets/logrotate.png',
	)
));