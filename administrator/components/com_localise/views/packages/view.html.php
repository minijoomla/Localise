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
 * Packages View class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseViewPackages extends JViewLegacy
{
  protected $items;
  protected $pagination;
  protected $form;
  protected $state;

  function display($tpl = null) 
  {
    // Get the data
    $items = $this->get('Items');
    $pagination = $this->get('Pagination');
    $state = $this->get('State');
    $form = $this->get('Form');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    // Assign the data
    $this->items = $items;
    $this->state = $state;
    $this->pagination = $pagination;
    $this->form = $form;

    // Set the toolbar
    $this->addToolbar();

    // Prepare the document
    $this->prepareDocument();

    // Display the view
    parent::display($tpl);

    // Set the document
    $this->prepareDocument();
  }

  protected function addToolbar() 
  {
    $canDo = LocaliseHelper::getActions();
    JToolBarHelper::title(JText::sprintf('COM_LOCALISE_HEADER_MANAGER', JText::_('COM_LOCALISE_HEADER_PACKAGES')), 'install');
    if ($canDo->get('localise.create')) 
    {
      JToolbarHelper::addNew('package.add');
    }
    if ($canDo->get('localise.edit')) 
    {
      JToolbarHelper::editList('package.edit');
    }
    if ($canDo->get('localise.create') || $canDo->get('localise.edit')) 
    {
      JToolbarHelper::divider();
    }
    if ($canDo->get('localise.delete')) 
    {
      JToolbarHelper::deleteList('COM_LOCALISE_MSG_PACKAGES_VALID_DELETE', 'packages.delete');
      JToolBarHelper::divider();
    }
    JToolBarHelper::custom('package.download', 'out.png', 'out.png', 'JTOOLBAR_EXPORT', true);
    JToolBarHelper::divider();
    JToolBarHelper::custom('package.language', 'archive.png', 'archive.png', 'COM_LOCALISE_TOOLBAR_PACKAGES_LANGUAGE', true);
    JToolbarHelper::divider();
    if ($canDo->get('package.batch')) 
    {
      JToolBarHelper::custom('package.batch', 'refresh.png', 'refresh.png', 'COM_LOCALISE_TOOLBAR_PACKAGES_BATCH', true);
      JToolbarHelper::divider();
    }
    if ($canDo->get('core.admin')) 
    {
      JToolbarHelper::preferences('com_localise');
      JToolbarHelper::divider();
    }
    JToolBarHelper::help('screen.packages', true);
  }

  /**
   * Returns an array of fields the table can be sorted by
   *
   * @return  array  Array containing the field name to sort by as the key and display text as value
   *
   * @since 3.0
   */
  protected function getSortFields()
  {
    return array(
      'title' => JText::_('COM_LOCALISE_HEADING_PACKAGES_TITLE'),
    );
  }

  protected function prepareDocument() 
  {
    $document = JFactory::getDocument();
    $document->setTitle(JText::sprintf('COM_LOCALISE_TITLE', JText::_('COM_LOCALISE_TITLE_PACKAGES')));

    // " onclick="javascript:if (document.adminForm.boxchecked.value==0){alert(\'Please make a selection from the list to export\');alert(\'coucou\'); alert(this.get(\'href\'));this.set(\'href\',\'essai\')}else{this.set(\'href\',\'essai\');}
    
  }

  /*  protected function prepareDocument()
  {
    $document = & JFactory::getDocument();
    $document->setTitle(JText::sprintf('COM_LOCALISE_TITLE', JText::_('COM_LOCALISE_TITLE_PACKAGES')));
    $document->addStyleDeclaration(".icon-32-language { background-image: url(components/com_localise/assets/images/icon-32-language.png); }");
    $document->addScriptDeclaration("
      window.addEvent('domready', function () {
        $('packages_form_core').onchange=
          function () {
            submitbutton('packages.display');
          }
        $('packages_form_home').onchange=
          function () {
            submitbutton('packages.display');
          }
        $('packages_form_thirdparty').onchange=
          function () {
            submitbutton('packages.display');
          }
      });
    ");
  }*/
}
