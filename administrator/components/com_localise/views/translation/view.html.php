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
 * Translation View class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseViewTranslation extends JViewLegacy
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
    JRequest::setVar('hidemainmenu', 1);
    $checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
    if ($this->state->get('translation.filename') == 'joomla') 
    {
      $filename = $this->state->get('translation.tag') . '.ini';
    }
    else
    {
      $filename = $this->state->get('translation.tag') . '.' . $this->state->get('translation.filename') . '.ini';
    }
    JToolbarHelper::title(JText::sprintf('COM_LOCALISE_HEADER_MANAGER', JText::sprintf($this->item->exists ? 'COM_LOCALISE_HEADER_TRANSLATION_EDIT' : 'COM_LOCALISE_HEADER_TRANSLATION_NEW', $filename)), 'langmanager.png');
    if (!$checkedOut) 
    {
      JToolbarHelper::apply('translation.apply', 'JTOOLBAR_APPLY');
      JToolbarHelper::save('translation.save', 'JTOOLBAR_SAVE');
    }
    JToolbarHelper::cancel('translation.cancel', 'JTOOLBAR_CANCEL');
    JToolBarHelper::divider();
    JToolBarHelper::help('screen.translation', true);
  }
  protected function prepareDocument() 
  {
    $document = JFactory::getDocument();
    $document->setTitle(JText::sprintf('COM_LOCALISE_TITLE', JText::_('COM_LOCALISE_TITLE_TRANSLATION')));
  }
}
