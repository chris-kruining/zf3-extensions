<?php

namespace CPB\Extensions\Laminas\Router
{
    class FilterNotCallableException extends \Exception
    {
        public function __construct()
        {
            parent::__construct('The provided filter is not callable', 0);
        }
    }
}
