<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Index',
                        'action' => 'index'
                    )
                )
            ),
            'bibliothequeAuteur' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/bibliotheque/[:auteur]',
                    'constraints' => array(
                        'auteur' => '[a-zA-Z_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Bibliotheque',
                        'action' => 'auteur'
                    )
                )
            ),
            'bibliothequeISBN' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/bibliotheque/[:isbn]',
                    'constraints' => array(
                        'isbn' => '[0-9-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MiniModule\Controller\Bibliotheque',
                        'action' => 'isbn'
                    )
                )
            ),
        )
    ),

    'view_manager' => array(
        'template_map' => array(
            'error' => __DIR__ . '/../view/error.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'mini-module/index/index' => __DIR__ . '/../view/index/index.phtml',

            'mini-module/bibliotheque/error' => __DIR__ . '/../view/bibliotheque/error.phtml',
            'mini-module/bibliotheque/information' => __DIR__ . '/../view/bibliotheque/information.phtml',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'MiniModule\Controller\Index' => 'MiniModule\Controller\IndexController',
            'MiniModule\Controller\Bibliotheque' => 'MiniModule\Controller\BibliothequeController',
        )
    )
);