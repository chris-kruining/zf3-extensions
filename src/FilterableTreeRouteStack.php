<?php

namespace CPB\Extensions\Zend\Router
{
    use Zend\Router\Http\TreeRouteStack;

    class FilterableTreeStack extends TreeRouteStack
	{
	    public static function factory($options = [])
        {
            return parent::factory($options);
        }
    }
}
