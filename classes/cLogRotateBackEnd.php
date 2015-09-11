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
use FFIF;

class cLogRotateBackEnd extends \BackendModule
{
	protected $strTemplate = 'be_cLogRotate';

	protected function compile()
	{
        $this->import('Input');
        $realFolder = TL_ROOT . '/' . $GLOBALS['TL_CONFIG']['uploadPath'] . '/cLogRotate';

        $subfolders = \cFindFolderInFolder::findMultipleFoldersByFolder($GLOBALS['TL_CONFIG']['uploadPath'] . '/cLogRotate');

        foreach ($subfolders as $key => $subfolder) {
            $logFiles[$subfolder->name] = \FilesModel::findMultipleFilesByFolder($subfolder->path);
        }

        $this->Template->headline     = 'LogRotate Downloads';
        $this->Template->downloadText = $GLOBALS['TL_LANG']['cLogRotate']['download'];
        $this->Template->showText     = $GLOBALS['TL_LANG']['cLogRotate']['show'];
        $this->Template->logs         = $logFiles;

        if ($this->Input->get('dl')) {
            $file = \FilesModel::findById($this->Input->get('dl'));
            $this->sendFileToBrowser($file->path);
            exit;
        }

        if($this->Input->get('show')){
            $file = \FilesModel::findById($this->Input->get('show'));
            $logdata = deserialize(file_get_contents(TL_ROOT . '/' . $file->path));
            $this->Template->logs = $logdata;
        }
	}
}