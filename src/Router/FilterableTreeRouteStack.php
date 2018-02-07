<?php

namespace CPB\Extensions\Zend\Router
{
    use Zend\Router\Http\TreeRouteStack;

    class FilterableTreeRouteStack extends TreeRouteStack
	{
	    use FilterTrait;

	    protected function init()
        {
            parent::init();

            $this->routePluginManager->setAllowOverride(true);

            $this->routePluginManager->setAlias('part', Part::class);
            $this->routePluginManager->setAlias('Part', Part::class);

            $this->routePluginManager->setAllowOverride(false);
        }
    }
}
