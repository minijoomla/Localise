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

jimport('joomla.form.formfield');

/**
 * Form Field Legend class.
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class JFormFieldLegend extends JFormField
{
  /**
   * The field type.
   *
   * @var    string
   */
  protected $type = 'Legend';

  /**
   * Method to get the field input.
   *
   * @return  string    The field input.
   */
  protected function getInput() 
  {
    $return = '<table style="float:left;">';
    $return.= '<tr><td><input class="translated" size="30" type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_TRANSLATED') . '" readonly="readonly"/></td></tr>';
    $return.= '<tr><td><input class="unchanged" size="30"  type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_UNCHANGED') . '" readonly="readonly"/></td></tr>';
    $return.= '<tr><td><input class="untranslated" size="30"  type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_UNTRANSLATED') . '" readonly="readonly"/></td></tr>';
    $return.= '<tr><td><input class="extra" size="30" type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_NOTINREFERENCE') . '" readonly="readonly"/></td></tr>';
    $return.= '</table>';
    return $return;
  }
}
