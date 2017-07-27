# zf3-filterablerouter
this is an expansion on the TreeRouteStack class that the zendframework/zend-router provides

# Instalation

```bash
$ composer require chris-kruining/zf3-filterablerouter
```

# Configuration

```php
return [
    ...
    'router' => [
        'router_class' => \CPB\Extensions\Zend\Router\FilterableTreeRouteStack::class,
        'route_error_callback' => [
            'controller' => \Your\Own\Controller::class,
        ]
    ],
    ...
];
```
