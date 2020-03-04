<?php

namespace CPB\Extensions\Laminas\Mvc\Service
{
    use CPB\Extensions\Laminas\Mvc\DispatchListener;
    use Interop\Container\ContainerInterface;
    use Laminas\ServiceManager\Factory\FactoryInterface;
    
    class DispatchListenerFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
        {
            return new DispatchListener($container->get('ControllerManager'));
        }
    }
}
