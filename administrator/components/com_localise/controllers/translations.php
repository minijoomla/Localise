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
jimport('joomla.filesystem.file');

/**
 * Translations Controller class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseControllerTranslations extends JControllerLegacy
{
  /*public function display()
  {
    $translations = & $this->getModel('translations');
    $view = & $this->getView('translations', 'html');
    if (!JFile::exists(LocaliseHelper::getPathMeta($translations->getClient(), $translations->getTag())))
    {
      $view->setLayout('error');
      $app = & JFactory::getApplication('administrator');
      $app->enqueueMessage(JText::sprintf('COM_LOCALISE_THE_LANGUAGE_ISO_TAG_DOES_NOT_EXIST_IN_THIS_CLIENT', $translations->getTag()), 'notice');
    }
    $view->setModel($translations, true);
    $view->display();
  }

  public function setRefTag()
  {
    $translations = & $this->getModel('translations');
    if ($translations->setRefTag())
    {
      $msg = JText::_('COM_LOCALISE_REFERENCE_LANGUAGE_CHANGED');
      $type = 'message';
    }
    else
    {
      $msg = JText::sprintf('COM_LOCALISE_ERROR_CHANGING_REFERENCE_LANGUAGE', $translations->getError());
      $type = 'error';
    }
    $url = "index.php?";
    $url.= "&option=com_localise";
    $url.= "&task=translations.display";
    $url.= "&client=" . $translations->getState('client');
    $url.= "&tag=" . $translations->getState('tag');
    $this->setRedirect($url, $msg, $type);
  }*/
}
