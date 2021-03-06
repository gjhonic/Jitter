<?php
return [

    //Фронтенд страницы
    'signin'  => 'auth/signin',
    'signup'  => 'auth/signup',
    'signout' => 'auth/signout',
    'index'   => 'site/index',
    'guide'   => 'site/guide',
    'confidentiality' => 'site/confidentiality',
    'about' => 'site/about',

    //Роутинг на модуль `constructor`
    'constructor' => 'constructor/page/index',
    'constructor/<controller:\w+>/<action:\w+>' => 'constructor/<controller>/<action>',

    //Роутинг на модуль `admin`
    'admin' => 'admin/page/index',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

    //Роутинг на модуль `game`
    'game' => 'game/page/index',
    'game/<controller:\w+>/<action:\w+>' => 'game/<controller>/<action>',
];