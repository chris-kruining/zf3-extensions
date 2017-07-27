<?php

namespace CPB\Extensions\Zend\Router
{
    use Psr\Log\InvalidArgumentException;
    use Zend\Stdlib\RequestInterface;

    trait FilterTrait
    {
        private $filter;

        protected function routeFromArray($spec)
        {
            if(key_exists('filter', $spec))
            {
                if(!is_callable($spec['filter']))
                {
                    throw new FilterNotCallableException;
                }

                $this->filter = $spec['filter'];
            }

            return parent::routeFromArray($spec);
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

            if($this->filter !== null && $match !== null && !$this->execute())
            {
                return new RouteMatch($match);
            }

            return $match;
        }

        protected function execute() : bool
        {
            $result = call_user_func($this->filter);

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