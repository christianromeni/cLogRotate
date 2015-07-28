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

namespace cLogRotate;

class cLogRotateBackEnd extends \BackendModule
{
	protected $strTemplate = 'be_cLogRotate';

	protected function compile() 
	{
        $this->import('Input');
        $realFolder = TL_ROOT . '/' . $GLOBALS['TL_CONFIG']['uploadPath'] . '/cLogRotate';
        $yearFolders = scan($realFolder);

        foreach ($yearFolders as $yearFolder) {
            $logFiles = scan($realFolder . '/' . $yearFolder);
            foreach ($logFiles as $logfile) {
                $logfileabsolute = $realFolder . '/' . $yearFolder . '/' . $logfile;
                $logfilerelative = $GLOBALS['TL_CONFIG']['uploadPath'] . '/cLogRotate/' . $yearFolder . '/' . $logfile;
                $logname = str_replace('.log', '', $logfile);
                $logfilename = date_format(date_create_from_format('Y-m-d_-_H-i-s', $logname), '[d.m.Y H:i]');
                $yearLogs[$yearFolder][] = array('name' => $logfilename,
                                                         'path' => $logfilerelative,
                                                         'size' => $this->human_filesize(filesize($logfileabsolute))
                                                         );
            }
        }
        
        $this->Template->headline     = 'LogRotate Downloads';
        $this->Template->downloadText = $GLOBALS['TL_LANG']['cLogRotate']['download'];
        $this->Template->logs         = $yearLogs;

        if ($this->Input->get('dl')) {
            $this->sendFileToBrowser($this->Input->get('dl'));
            exit;
        }

	}

    protected function human_filesize($bytes, $dec = 2)
    {
        $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
}