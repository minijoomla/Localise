<?php
/*------------------------------------------------------------------------
# com_localise - Localise
# ------------------------------------------------------------------------
# author    Mohammad Hasani Eghtedar <m.h.eghtedar@gmail.com>
# copyright Copyright (C) 2012 http://joomlacode.org/gf/project/com_localise/. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomlacode.org/gf/project/com_localise/
# Technical Support:  Forum - http://joomlacode.org/gf/project/com_localise/forum/
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Languages Controller class for the Localise component
 *
 * @package Extensions.Components
 * @subpackage Localise
 */
class LocaliseControllerLanguages extends JControllerLegacy
{
  /**
   * Proxy for getModel.
   */

  public function &getModel($name = 'Languages', $prefix = 'LocaliseModel', $config = array('ignore_request' => true))
  {
    $model = parent::getModel($name, $prefix, $config);
    return $model;
  }
  
/*public function display($cachable = false) 
  {
    JRequest::setVar('view', 'languages');
    parent::display($cachable);
  }

  public function delete() 
  {
    // Check for request forgeries.
    JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
  
    // Initialise variables.
    $user = JFactory::getUser();
    $ids = JRequest::getVar('cid', array(), '', 'array');
    $params = JComponentHelper::getParams('com_languages');
  
    // Access checks.
    foreach($ids as $i => $id) 
    {
      list($client, $tag) = explode('|', $id);
      $id = LocaliseHelper::getFileId(constant('LOCALISEPATH_' . strtoupper($client)) . "/language/$tag/$tag.xml");
      $default = $params->get($client, 'en-GB');
      if ($tag == $default) 
      {
        // Prune items that you can't delete.
        unset($ids[$i]);
        JError::raiseNotice(403, JText::sprintf('COM_LOCALISE_CANNOT_REMOVE_DEFAULT_LANGUAGE', $folder));
        break;
      }
      if ($tag == 'en-GB') 
      {
        // Prune items that you can't delete.
        unset($ids[$i]);
        JError::raiseNotice(403, JText::_('COM_LOCALISE_CANNOT_REMOVE_ENGLISH_LANGUAGE'));
        break;
      }
      if (!$user->authorise('core.delete', 'com_localise.' . (int)$id)) 
      {
        // Prune items that you can't delete.
        unset($ids[$i]);
        JError::raiseNotice(403, JText::_('JERROR_CORE_DELETE_NOT_PERMITTED'));
        break;
      }
    }
    if (empty($ids)) 
    {
      $msg = JText::_('JERROR_NO_ITEMS_SELECTED');
      $type = 'error';
    }
    else
    {
      // Get the model.
      $model = $this->getModel();
  
      // Remove the items.
      if (!$model->delete($ids)) 
      {
        $msg = implode("<br />", $model->getErrors());
        $type = 'error';
      }
      else
      {
        $msg = JText::sprintf('JController_N_Items_deleted', count($ids));
        $type = 'message';
      }
    }
    $this->setRedirect(JRoute::_('index.php?option=com_localise&view=languages', false), $msg, $type);
  }*/
}
