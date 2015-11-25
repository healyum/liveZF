<?php
namespace MiniModule;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\TreeRouteStack;
use Zend\View\Resolver\TemplateMapResolver;

class Module implements BootstrapListenerInterface, ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        // $e->getTarget() renvoit Zend\MVC\Application
        $application = $e->getTarget();
        $sm = $application->getServiceManager();
		
		$event = $application->getEventManager();
		$event->attach(MvcEvent::EVENT_DISPATCH_ERROR, function(MvcEvent $e) {
			error_log($e->getError());
			error_log($e->getControllerClass().' '.$e->getController());
		});
    }
    
    public function getAutoloaderConfig()
    {
    	return array(
    			'Zend\Loader\StandardAutoloader' => array(
    					'namespaces' => array(
    							__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
    					),
    			),
    	);
    }
}