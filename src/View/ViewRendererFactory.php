<?php

namespace CPB\Extensions\Zend\View
{
    use CPB\Extensions\Zend\View\Renderer\StreamRenderer;
    use Interop\Container\ContainerInterface;
    use Zend\ServiceManager\Factory\FactoryInterface;
    
    class ViewRendererFactory implements FactoryInterface
    {
        public function __invoke(ContainerInterface $container, $name, array $options = null)
        {
            $renderer = new StreamRenderer();
            $renderer->setHelperPluginManager($container->get('ViewHelperManager'));
            $renderer->setResolver($container->get('ViewResolver'));
        
            return $renderer;
        }
    }
}