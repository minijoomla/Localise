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
 * Export Package View class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseViewExportPackage extends JViewLegacy
{
  protected $item;

  /**
   * Display the view
   */
  public function display($tpl = null) 
  {
    $item = $this->get('Item');

    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
    {
      JError::raiseError(500, implode("\n", $errors));
      return false;
    }
    $document = JFactory::getDocument();
    $document->setMimeEncoding('application/zip');
    JResponse::setHeader('Content-disposition', 'attachment; filename="' . $item->filename . '.zip"; creation-date="' . JFactory::getDate()->toRFC822() . '"', true);
    echo $item->contents;
  }
}
