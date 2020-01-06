<?php

return[
    'categories'=>[
        'base_uri' => env('CATEGORIES_SERVICE_BASE_URI'),
        'secret'=>env('CATEGORIES_SERVICE_SECRET')
    ],
    'clothes'=>[
        'base_uri' => env('CLOTHES_SERVICE_BASE_URI'),
        'secret'=>env('CLOTHES_SERVICE_SECRET')
    ]
];