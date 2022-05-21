<?php
return [

    'logout' => 'auth/logout',
    'login' => 'auth/login',
    'register' => 'auth/register'

    //Роутинг на модуль `admin`
    'admin' => 'admin/page/index',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
];