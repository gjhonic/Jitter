<?php
return [

    'signin' => 'auth/signin',
    'signup' => 'auth/signup',
    'signout' => 'auth/signout',

    'about' => 'site/about',
    'index' => 'site/index',

    //Роутинг на модуль `admin`
    'admin' => 'admin/page/index',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

    //Роутинг на модуль `game`
    'game' => 'game/page/index',
    'game/<controller:\w+>/<action:\w+>' => 'game/<controller>/<action>',
];