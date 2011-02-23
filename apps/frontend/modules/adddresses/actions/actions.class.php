<?php

/**
 * adddresses actions.
 *
 * @package    coscupdemo
 * @subpackage adddresses
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class adddressesActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->helloWorld='helloworld';
  }
}
