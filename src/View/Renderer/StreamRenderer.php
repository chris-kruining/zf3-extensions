<?php

namespace CPB\Extensions\Laminas\View\Renderer
{
    use Zend\Laminas\Renderer\PhpRenderer;
    
    class StreamRenderer extends PhpRenderer
    {
        public function render($nameOrModel, $values = null)
        {
            return parent::render($nameOrModel, $values);
        }
    }
}
