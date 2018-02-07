<?php

namespace CPB\Extensions\Zend\Router
{
    class RouteMatch extends \Zend\Router\Http\RouteMatch
    {
        protected $original;

        public function __construct(\Zend\Router\Http\RouteMatch $original)
        {
            $this->original = $original;
            $this->matchedRouteName = $original->getMatchedRouteName();

            parent::__construct([
                'error' => 'route matched but filter returned false',
                'errorCode' => 403
            ]);
        }
    }
}