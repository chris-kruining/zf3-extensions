<?php

namespace CPB\Extensions\Zend\View\Renderer
{
    use Zend\View\Renderer\PhpRenderer;
    
    class StreamRenderer extends PhpRenderer
    {
        public function render($nameOrModel, $values = null)
        {
            return parent::render($nameOrModel, $values);
        }
    }
}