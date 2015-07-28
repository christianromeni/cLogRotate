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

class cLogRotateHook extends \System
{

    /**
     * Load database object
     */
    protected function __construct()
    {
        // Import database instance
        $this->import('Database');

        parent::__construct();
    }

    /**
     * backupLogAndCleanUp cron
     *
     * Backup tl_log to file and clean it up 
     *
     */
    public function backupLogAndCleanUp()
    {
        // Define Filename and Folder
        $file   = $GLOBALS['TL_CONFIG']['uploadPath'] . '/cLogRotate/' . date('Y') . '/' . date('Y-m-d_-_H-i-s') . '.log';
        $folder = dirname($file);

        // Create Folder if it does not exist
        if (!is_dir($folder))
        {
            new \Folder($folder);
        }

        // Create database request and store result
        $result = $this->Database
                     ->prepare('SELECT id, tstamp, source, action, username, text, func, ip, browser FROM tl_log')
                     ->execute()
                     ->fetchAllassoc();

        // serialize result
        $dump = serialize($result);

        // Create File and write the dump in it.
        if (!file_exists(TL_ROOT .'/'. $file)) 
        {
            $file = new \File($file);
            $file->write($dump);
            $continue = $file->close();
        }

        if ($continue && \Config::get('rotation_cleanup')) {
            
        }
    }
}
