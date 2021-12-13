<?php

namespace CPB\Extensions\Laminas\Router
{
    use Psr\Log\InvalidArgumentException;
    use Laminas\Stdlib\RequestInterface;

    trait FilterTrait
    {
        private $filters = [];

        public function addRoute($name, $route, $priority = null)
        {
            if(!key_exists($name, array_keys($this->filters)) && key_exists('filter', $route))
            {
                if(!is_callable($route['filter']))
                {
                    throw new FilterNotCallableException;
                }

                $this->filters[$name] = $route['filter'];
            }

            parent::addRoute($name, $route, $priority);
        }

        protected function setFilter(callable $filter)
        {
            $this->filter = $filter;
        }

        protected function getFilter() : callable
        {
            return $this->filter;
        }

        public function match(RequestInterface $request, $pathOffset = null, array $options = [])
        {
            $match = parent::match($request, $pathOffset, $options);

            if($match !== null)
            {
                $name = array_intersect(explode('/', $match->getMatchedRouteName() ?? ''), array_keys($this->filters))[0] ?? null;

                if($name !== null && !$this->execute($name))
                {
                    return new RouteMatch($match);
                }
            }

            return $match;
        }

        protected function execute(string $name) : bool
        {
            $result = call_user_func($this->filters[$name]);

            if(!is_bool($result))
            {
                throw new InvalidArgumentException(
                    'The filter function did\'t return a boolean'
                );
            }

            return $result;
        }
    }
}
