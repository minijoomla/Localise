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
 * View class for download a package.
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseViewDownloadPackage extends JViewLegacy
{
  protected $form;
  protected $item;

  /**
   * Display the view
   */
  public function display($tpl = null) 
  {
    $form = $this->get('Form');
    $item = $this->get('Item');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode("\n", $errors));
      return false;
    }
    $this->form = $form;
    $this->item = $item;
    
    parent::display($tpl);
  }
}
