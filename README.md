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
        ],
        'routes' => [
            'sale' => [
                'type'=> 'Segment',
                'filter' => <CALLABLE>,
                'options'=> [
                    'route' => '/sale[/:id]',
                    'constraints' => [
                        'id' => '\d+'
                    ],
                    'defaults' => [
                        'controller' => \Your\Own\Controller::class,
                        'id' => 0,
                    ],
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'discover' => [
                        'type' => 'Method',
                        'options' => [
                            'verb' => 'options,head',
                            'defaults' => [
                                'action' => 'list',
                            ],
                        ],
                    ],
                    'read' => [
                        'type' => 'Method',
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'action' => 'read',
                            ],
                        ],
                    ],
                    'create' => [
                        'type' => 'Method',
                        'options' => [
                            'verb' => 'post',
                            'defaults' => [
                                'action' => 'create',
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ],
    ...
];
```

To configure this zend extension all you need to do is
- set the `'router_class'` to `\CPB\Extensions\Zend\Router\FilterableTreeRouteStack::class`.
- supply an array to `'route_error_callback'`, this array needs at least a controller key-value, the second key you can apply is 'action' this value defaults to `'error'`.
- each route now has an extra config key besides `'type'` and `'options'` you can now also supply `'filter' => <CALLABLE>`, where `<CALLABLE>` is a callable type (i.e. `\Closure`, `[class, method]`, `'function'`)
