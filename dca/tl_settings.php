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

$GLOBALS['TL_DCA']['tl_settings']['fields']['rotation_timespan'] = array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan'],
        'inputType'          => 'select',
        'options'            => array('monthly','weekly','daily','hourly','minutely'),
        'reference'          => &$GLOBALS['TL_LANG']['tl_settings']['rotation_timespan'], 
        'exclude'            => true,
        'eval'               => array(
            'mandatory'          => false,
            'includeBlankOption' => false,
            'multiple'           => false,
            'chosen'             => false,
            'tl_class'           => 'w50 autoheight'
        ),
        'sql'                => "varchar(500) NOT NULL default 'montly'"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['rotation_cleanup'] = array
    (
        'label'              => &$GLOBALS['TL_LANG']['tl_settings']['rotation_cleanup'],
        'inputType'          => 'checkbox',
        'eval'               => array(
            'tl_class'           => 'w50 autoheight m12'
        )
);

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{logrotate_legend},rotation_timespan,rotation_cleanup;';

