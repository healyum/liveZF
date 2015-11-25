<?php
namespace MiniModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BibliothequeController extends AbstractActionController
{
    private static $bibliotheque = array(
        array('isbn' => '123-456-789', 'auteur' => 'Proust'),
        array('isbn' => '987-321-654', 'auteur' => 'Pagnol'),
    );

    private static $verif = false;

    public function auteurAction()
    {
        $auteur = $this->getEvent()->getRouteMatch()->getParam('auteur');
        $isbn = '';

        foreach(self::$bibliotheque as $key => $value)
        {
            if ($value['auteur'] == $auteur)
            {
                self::$verif = true;
                $auteur = $value['auteur'];
                $isbn = $value['isbn'];
            }
        }

        if (self::$verif == true)
        {
            $view = new ViewModel(array(
                'auteur' => $auteur,
                'isbn' => $isbn,
            ));
            $view->setTemplate('mini-module/bibliotheque/information');
            return $view;
        }
        else
        {
            $view = new ViewModel();
            $view->setTemplate('mini-module/bibliotheque/error');
            return $view;
        }
    }

    public function isbnAction()
    {
        $isbn = $this->getEvent()->getRouteMatch()->getParam('isbn');
        $auteur = '';

        foreach(self::$bibliotheque as $key => $value)
        {
            if ($value['isbn'] == $isbn)
            {
                self::$verif = true;
                $auteur = $value['auteur'];
                $isbn = $value['isbn'];
            }
        }

        if (self::$verif == true)
        {
            $view = new ViewModel(array(
                'auteur' => $auteur,
                'isbn' => $isbn,
            ));
            $view->setTemplate('mini-module/bibliotheque/information');
            return $view;
        }
        else
        {
            $view = new ViewModel();
            $view->setTemplate('mini-module/bibliotheque/error');
            return $view;
        }
    }
}
