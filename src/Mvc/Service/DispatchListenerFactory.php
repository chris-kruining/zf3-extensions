<?php

namespace CPB\Extensions\Zend\Mvc\Service
{
    use CPB\Extensions\Zend\Mvc\DispatchListener;
    use Interop\Container\ContainerInterface;
    use Zend\ServiceManager\Factory\FactoryInterface;
    
    class DispatchListenerFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new DispatchListener($container->get('ControllerManager'));
        }
    }
}
