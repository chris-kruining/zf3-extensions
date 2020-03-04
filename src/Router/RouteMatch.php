<?php

namespace CPB\Extensions\Laminas\Router
{
    class RouteMatch extends \Laminas\Router\Http\RouteMatch
    {
        protected $original;

        public function __construct(\Laminas\Router\Http\RouteMatch $original)
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
