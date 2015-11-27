<?php
namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
	public function indexAction()
	{
		return array();
	}
	
	public function formAction()
	{
		return array();
	}
	public function traiteAction()
	{
		return array( 'login' => $_GET['log'] );
	}
    
    /*public function indexAction()
    {
        $nom = 'tintin';
        return array('no' => $nom);
    }*/
}