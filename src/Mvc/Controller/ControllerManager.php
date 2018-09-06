<?php

namespace CPB\Extensions\Zend\Mvc\Controller
{
    class ControllerManager extends \Zend\Mvc\Controller\ControllerManager
    {
        protected $autoAddInvokableClass = true;
    }
}