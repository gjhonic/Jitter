<?php
return [

    //Роутинг на модуль `admin`
    'admin' => 'admin/page/index',
    'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
];