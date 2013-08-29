<?php
/*------------------------------------------------------------------------
# com_localise - Localise
# ------------------------------------------------------------------------
# author    Mohammad Hasani Eghtedar <m.h.eghtedar@gmail.com>
# copyright Copyright (C) 2010 http://joomlacode.org/gf/project/com_localise/. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomlacode.org/gf/project/com_localise/
# Technical Support:  Forum - http://joomlacode.org/gf/project/com_localise/forum/
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_localise')) 
{
  return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include helper files
require_once JPATH_COMPONENT . '/helpers/defines.php';
require_once JPATH_COMPONENT . '/helpers/localise.php';

// Include dependancies
jimport('joomla.application.component.controller');

//Get the controller
$controller = JControllerLegacy::getInstance('Localise');

// Execute the task.
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
