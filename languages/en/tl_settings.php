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

$GLOBALS['TL_LANG']['tl_settings']['logrotate_legend'] = 'Log Rotation';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan'][0] = 'Rotationtimespan';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan'][1] = 'How frequent should the log file be created?';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan']['monthly'] = 'Montly';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan']['weekly'] = 'Weekly';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan']['daily'] = 'Daily';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan']['hourly'] = 'Hourly';
$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan']['minutely'] = 'Minutely';
$GLOBALS['TL_LANG']['tl_settings']['rotation_cleanup'][0] = 'Empty System-Log database';
$GLOBALS['TL_LANG']['tl_settings']['rotation_cleanup'][1] = 'Should the System-Log database be emptied after the export?';