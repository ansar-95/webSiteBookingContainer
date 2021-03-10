<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'default' => [
                    'adapter' => 'mysql',
                    'classname' =>
                    'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn' =>
                    'mysql:host=localhost;dbname=tholdi_reservation',
                    'user' => 'root',
                    'password' => 'root',
                    'attributes' => []
                ],
            ]
        ],
        'general' => [
            'project' => 'tholdi-resa'
        ],
        'paths' => [
            'projectDir' => '/var/www/html/tholdi-resa',
            'schemaDir' => '/var/www/html/tholdi-resa/script',
            'phpDir' => '/var/www/html/tholdi-resa/app/Http/Model'
        ],
        'runtime' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ],
        'generator' => [
            'defaultConnection' => 'default',
            'connections' => ['default']
        ]
    ]
];
