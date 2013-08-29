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

jimport('joomla.application.component.view');

/**
 * Language View class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseViewLanguage extends JViewLegacy
{
  protected $state;
  protected $item;
  protected $form;

  /**
   * Display the view
   */
  public function display($tpl = null) 
  {
    jimport('joomla.client.helper');

    // Get the data
    $state = $this->get('State');
    $item = $this->get('Item');
    $form = $this->get('Form');
    $formftp = $this->get('FormFtp');
    $ftp = JClientHelper::setCredentialsFromRequest('ftp');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode("\n", $errors));
      return false;
    }

    // Assign the data
    $this->state = $state;
    $this->item = $item;
    $this->form = $form;
    $this->formftp = $formftp;
    $this->ftp = $ftp;

    // Set the toolbar
    $this->addToolbar();

    // Prepare the document
    $this->prepareDocument();

    // Display the view
    parent::display($tpl);
  }
  protected function addToolbar() 
  {
    JRequest::setVar('hidemainmenu', true);
    $user = JFactory::getUser();
    $isNew = empty($this->item->id);
    $checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
    JToolbarHelper::title(JText::sprintf('COM_LOCALISE_HEADER_MANAGER', $isNew ? JText::_('COM_LOCALISE_HEADER_LANGUAGE_NEW') : JText::_('COM_LOCALISE_HEADER_LANGUAGE_EDIT')), 'langmanager.png');

    // If not checked out, can save the item.
    if (!$checkedOut) 
    {
      JToolbarHelper::apply('language.apply', 'JTOOLBAR_APPLY');
      JToolbarHelper::save('language.save', 'JTOOLBAR_SAVE');
    }
    JToolBarHelper::cancel('language.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    JToolBarHelper::divider();
    JToolBarHelper::help('screen.language', true);
  }
  protected function prepareDocument() 
  {
    $document = JFactory::getDocument();
    $document->setTitle(JText::sprintf('COM_LOCALISE_TITLE', JText::_('COM_LOCALISE_TITLE_LANGUAGE')));
  }
}
