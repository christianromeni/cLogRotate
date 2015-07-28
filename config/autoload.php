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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'cLogRotate',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'cLogRotate\cLogRotateHook' => 'system/modules/cLogRotate/classes/cLogRotateHook.php',
	'cLogRotate\cLogRotateBackEnd' => 'system/modules/cLogRotate/classes/cLogRotateBackEnd.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_cLogRotate' => 'system/modules/cLogRotate/templates',
));
