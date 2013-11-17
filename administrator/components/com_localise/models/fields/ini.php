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
 * Form Field Ini class.
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class JFormFieldIni extends JFormField
{
  /**
   * The field type.
   *
   * @var    string
   */
  protected $type = 'Ini';

  /**
   * Method to get the field input.
   *
   * @return  string    The field input.
   */
  protected function getInput() 
  {
    $rows   = (string) $this->element['rows'];
    $cols   = (string) $this->element['cols'];
    $height = (string) $this->element['height'] ? (string) $this->element['height'] : '250';
    $width  = (string) $this->element['width']  ? (string) $this->element['width']  : '97%';
    $class  = (string) $this->class ? ' class="' . (string) $this->class . '"' : ' class="text_area"';

    // Only add "px" to width and height if they are not given as a percentage
    if (is_numeric($width)) 
    {
      $width.= 'px';
    }
    if (is_numeric($height)) 
    {
      $height.= 'px';
    }
    JHtmlBehavior::framework();//JHtml::_('core');
    JHtml::_('script', 'editors/codemirror/codemirror.js', null, true);
    JHtml::_('stylesheet', 'editors/codemirror/codemirror.css', null, true);
    $options = new JObject;
    $compressed = JFactory::getApplication()->getCfg('debug') ? '-uncompressed' : '';
    $options->basefiles = array('basefiles' . $compressed . '.js');
    $options->path = JURI::root(true) . '/media/editors/codemirror/js/';
    $options->parserfile = JURI::root(true) . '/media/com_localise/js/parseini.js';//'../../../com_localise/js/parseini.js';
    $options->stylesheet = JURI::root(true) . '/media/com_localise/css/localise.css';
    $options->height = $height;
    $options->width = $width;
    $options->continuousScanning = 500;
    $options->lineNumbers = true;
    $options->textWrapping = true;
    $options->tabMode = 'default';
    $html = array();
    $html[] = '<textarea' . $class . ' name="' . $this->name . '" id="' . $this->id . '" cols="' . $cols . '" rows="' . $rows . '">' . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '</textarea>';
    $html[] = '<script type="text/javascript">';
    $html[] = '(function() {';
    $html[] = 'var editor = CodeMirror.fromTextArea(document.getElementById("' . $this->id . '"), ' . json_encode($options) . ');';
    $html[] = 'Joomla.editors.instances[\'' . $this->id . '\'] = editor;';
    $html[] = '})()';
    $html[] = '</script>';
    return implode("\n", $html);
  }

  /**
   * Get the save javascript code.
   *
   * @return  string
   */
  public function save() 
  {
    return "document.getElementById('" . $this->id . "').value = Joomla.editors.instances['" . $this->id . "'].getValue();\n";
  }
}
