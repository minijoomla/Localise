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

jimport('joomla.html.html');
jimport('joomla.form.formfield');

/**
 * Form Field Client class.
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class JFormFieldClient extends JFormField
{
  /**
   * The field type.
   *
   * @var    string
   */
  protected $type = 'Client';

  /**
   * Method to get the field input.
   *
   * @return  string    The field input.
   */
  protected function getInput() 
  {
    $attributes = '';

    // To avoid user's confusion, readonly="true" should imply disabled="true".
    if ((string)$this->element['readonly'] == 'true' || (string)$this->element['disabled'] == 'true') 
    {
      $attributes.= ' disabled="disabled"';
    }
    if ($v = (string)$this->element['onchange']) 
    {
      $attributes.= ' onchange="' . $v . '"';
    }
    $attributes.= ' class="'.(string) $this->element['class'].' iconlist-16-' . $this->value . '"';
    $options = array();
    foreach ($this->element->children() as $option) 
    {
      $options[] = JHtml::_('select.option', $option->attributes('value'), JText::_(trim($option)), array('option.attr' => 'attributes', 'attr' => ''));
    }
    $options[] = JHtml::_('select.option', 'site', JText::_('COM_LOCALISE_OPTION_CLIENT_SITE'), array('option.attr' => 'attributes', 'attr' => 'class="iconlist-16-site"'));
    $options[] = JHtml::_('select.option', 'administrator', JText::_('COM_LOCALISE_OPTION_CLIENT_ADMINISTRATOR'), array('option.attr' => 'attributes', 'attr' => 'class="iconlist-16-administrator"'));
    if (LocaliseHelper::hasInstallation()) 
    {
      $options[] = JHtml::_('select.option', 'installation', JText::_('COM_LOCALISE_OPTION_CLIENT_INSTALLATION'), array('option.attr' => 'attributes', 'attr' => 'class="iconlist-16-installation"'));
    }
    $return = array();
    if ((string) $this->element['readonly'] == 'true') {
      $return[] = JHtml::_('select.genericlist', $options, '', array('id' => $this->id, 'list.select' => $this->value, 'option.attr' => 'attributes', 'list.attr' => $attributes));
      $return[] = '<input type="hidden" name="'.$this->name.'" value="'.$this->value.'"/>';
    }
    else {
      $return[] = JHtml::_('select.genericlist', $options, $this->name, array('id' => $this->id, 'list.select' => $this->value, 'option.attr' => 'attributes', 'list.attr' => $attributes));
    }
    return implode($return);
  }
}
