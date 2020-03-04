<?php

namespace CPB\Extensions\Laminas\Mvc
{
    use Laminas\Router\RouteMatch;
    use Laminas\Mvc\Controller\ControllerManager;
    use Laminas\Mvc\MvcEvent;

    class DispatchListener extends \Laminas\Mvc\DispatchListener
    {
        protected $controllerManager;

        public function __construct(ControllerManager $controllerManager)
        {
            $this->controllerManager = $controllerManager;

            parent::__construct($controllerManager);
        }

        public function onDispatch(MvcEvent $e)
        {
            $routeMatch        = $e->getRouteMatch();
            $controllerName    = $routeMatch instanceof RouteMatch
                ? $routeMatch->getParam('controller', 'not-found')
                : 'not-found';
            $controllerManager = $this->controllerManager;

            if(class_exists($controllerName) && !$controllerManager->has($controllerName))
            {
                $controllerManager->setAllowOverride(true);
                $controllerManager->setInvokableClass($controllerName);
                $controllerManager->setAllowOverride(false);
            }

            return parent::onDispatch($e);
        }
    }
}
