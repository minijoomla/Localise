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

jimport('joomla.application.component.modelform');
jimport('joomla.utilities.utility');

/**
 * Download package Model class for the Localise component
 *
 * @package    Extensions.Components
 * @subpackage  Localise
 */
class LocaliseModelDownloadPackage extends JModelForm
{
  protected $_context = 'com_localise.package';

  /**
   * Method to auto-populate the model state.
   */
  protected function populateState() 
  {
    // Get the data
    $name = JRequest::getVar('name');
    $standalone = JRequest::getVar('standalone');
    $author = JRequest::getString(JApplication::getHash($this->_context . '.author'), '', 'cookie');
    $copyright = JRequest::getString(JApplication::getHash($this->_context . '.copyright'), '', 'cookie');
    $email = JRequest::getString(JApplication::getHash($this->_context . '.email'), '', 'cookie');
    $url = JRequest::getString(JApplication::getHash($this->_context . '.url'), '', 'cookie');
    $version = JRequest::getString(JApplication::getHash($this->_context . '.version'), '', 'cookie');
    $license = JRequest::getString(JApplication::getHash($this->_context . '.license'), '', 'cookie');

    // Set the state
    $this->setState('downloadpackage.name', $name);
    $this->setState('downloadpackage.standalone', $standalone);
    $this->setState('downloadpackage.author', $author);
    $this->setState('downloadpackage.copyright', $copyright);
    $this->setState('downloadpackage.email', $email);
    $this->setState('downloadpackage.url', $url);
    $this->setState('downloadpackage.version', $version);
    $this->setState('downloadpackage.license', $license);
  }

  /**
   * Method to get the record form.
   *
   * @return  mixed  JForm object on success, false on failure.
   * @since  1.6
   */
  public function getForm($data = array(), $loadData = true)
  {
    // Get the form.
    //$form = parent::getForm('downloadpackage', 'com_localise.downloadpackage', array('array' => 'jform'));
    $form = $this->loadForm('com_localise.downloadpackage', 'downloadpackage', array('control' => 'jform', 'load_data' => $loadData));

    // Check for an error.
    if (JError::isError($form)) 
    {
      $this->setError($form->getMessage());
      return false;
    }
    $form->setValue('name',  NULL, $this->getState('downloadpackage.name'));  
    $form->setValue('author', NULL, $this->getState('downloadpackage.author'));
    $form->setValue('copyright', NULL, $this->getState('downloadpackage.copyright'));
    $form->setValue('email', NULL, $this->getState('downloadpackage.email'));
    $form->setValue('url', NULL, $this->getState('downloadpackage.url'));
    $form->setValue('version', NULL, $this->getState('downloadpackage.version'));
    $form->setValue('license', NULL, $this->getState('downloadpackage.license'));
    return $form;
  }

  /**
   * Method to get the Item.
   *
   * @return  mixed  JForm object on success, false on failure.
   * @since  1.6
   */
  public function getItem() 
  {
    $item = new JObject();
    $item->standalone = $this->getState('downloadpackage.standalone');
    return $item;
  }
}
