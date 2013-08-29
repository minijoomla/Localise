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
 * Form Field Search class.
 *
 * @package Extensions.Components
 * @subpackage  Localise
 */
class JFormFieldSearch extends JFormField
{
  /**
   * The field type.
   *
   * @var    string
   */
  protected $type = 'Search';

  /**
   * Method to get the field input.
   *
   * @return  string    The field input.
   */
  protected function getInput() 
  {
    $html = '<div class="filter-search btn-group pull-left">';
    $html.= '<input type="text" name="' . $this->name . '" id="' . $this->id . '" placeholder="'.JText::_($this->element['placeholder']).'" value="' . $this->value . '" title="' . JText::_('JSEARCH_FILTER') . '" onchange="this.form.submit();" />';
    $html.= '</div><div class="btn-group pull-left">';
    $html.= '<button type="submit" class="btn" rel="tooltip" title="'.JText::_('JSEARCH_FILTER_SUBMIT').'"><i class="icon-search"></i></button>';
    $html.= '<button type="button" class="btn" rel="tooltip" title="'.JText::_('JSEARCH_FILTER_CLEAR').'" onclick="document.id(\'' . $this->id . '\').value=\'\';this.form.submit();"><i class="icon-remove"></i></button>';
    $html.= '</div>';

    return $html;
  }
}
