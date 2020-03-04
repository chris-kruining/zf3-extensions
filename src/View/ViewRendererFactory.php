<?php

namespace CPB\Extensions\Laminas\View
{
    use CPB\Extensions\Laminas\View\Renderer\StreamRenderer;
    use Interop\Container\ContainerInterface;
    use Laminas\ServiceManager\Factory\FactoryInterface;
    
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
