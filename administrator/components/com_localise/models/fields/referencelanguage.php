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
jimport('joomla.filesystem.folder');
include_once JPATH_ADMINISTRATOR . '/components/com_localise/helpers/defines.php';

/**
 * Renders a list of all possible languages (they must have a site, language and installation part)
 * Use instead of the joomla library languages element, which only lists languages for one client
 */
class JFormFieldReferenceLanguage extends JFormField
{
  /**
   * The field type.
   *
   * @var    string
   */
  protected $type = 'ReferenceLanguage';

  /**
   * Method to get the field input.
   *
   * @return  string    The field input.
   */
  protected function getInput() 
  {
    $attributes = '';
    if ($v = (string)$this->element['onchange']) 
    {
      $attributes.= ' onchange="' . $v . '"';
    }
    $admin = JLanguage::getKnownLanguages(LOCALISEPATH_ADMINISTRATOR);
    $site = JLanguage::getKnownLanguages(LOCALISEPATH_SITE);
    if (JFolder::exists(LOCALISEPATH_INSTALLATION)) 
    {
      $installation = JLanguage::getKnownLanguages(LOCALISEPATH_INSTALLATION);
      $languages = array_intersect_key($admin, $site, $installation);
    }
    else
    {
      $languages = array_intersect_key($admin, $site);
    }
    foreach ($languages as $i => $language) 
    {
      $languages[$i] = JArrayHelper::toObject($language);
    }
    JArrayHelper::sortObjects($languages, 'name');
    $options = array();
    foreach ($this->element->children() as $option) 
    {
      $options[] = JHtml::_('select.option', $option->attributes('value'), JText::_(trim($option->data())));
    }
    foreach ($languages as $language) 
    {
      $options[] = JHtml::_('select.option', $language->tag, $language->name);
    }
    $return = JHtml::_('select.genericlist', $options, $this->name, $attributes, 'value', 'text', $this->value, $this->id);
    return $return;
  }
}
