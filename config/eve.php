<?php

return [
    'esi' => [
        'base_uri' => env("EVE_ESI_URL"),
        'server' => env("EVE_ESI_SERVER", 'tranquility'),

        'client_id' => env("EVE_ESI_CLIENT_ID"),
        'secret_key' => env("EVE_ESI_SECRET_KEY"),

        'corporation' => env("EVE_ESI_CORPORATION_ID")
    ]
];
