<?php

namespace CPB\Extensions\Laminas\Router
{
    use Laminas\Mvc\MvcEvent;

    class RouteListener extends \Laminas\Mvc\RouteListener
    {
        public function onRoute(MvcEvent $event)
        {
            $route = parent::onRoute($event);

            if(!$route instanceof RouteMatch)
            {
                return $route;
            }

            // NOTE(Chris Kruining)
            // If an filter invalidated the
            // route this is where we land,
            // in all other cases we have
            // already returned the vanilla
            // Zend results
            $config = $event->getApplication()->getServiceManager()->get('Config');
            $config = $config['router']['route_error_callback'] ?? [];
            $config = array_merge([
                'controller' => '',
                'action' => 'error',
            ], $config);

            $route->setParam('controller', $config['controller']);
            $route->setParam('action', $config['action']);

            return $route;
        }
    }
}
