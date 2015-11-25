<?php
namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $nom = 'tintin';
        return array('no' => $nom);
    }
}