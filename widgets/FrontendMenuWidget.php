<?php

namespace app\widgets;

use app\models\User;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

/**
 * Виджет для навигации во фронте
 */
class FrontendMenuWidget extends Widget
{
    /**
     * Метод возвращает роли пользователей
     * @return array
     */
    public static function userRoles(): array
    {
        return [
            User::ROLE_ADMIN,
            User::ROLE_USER,
            User::ROLE_GUEST
        ];
    }

    /**
     * Метод возвразает навигацию
     * @return array
     */
    private static function getNavigates(): array
    {
        return [
            'admin' => [
                'navs' => [
                    [
                        'title' => Yii::t('app', 'Home'),
                        'url' => Url::to('index'),
                    ],
                    [
                        'title' => Yii::t('app', 'About'),
                        'url' => Url::to('about'),
                    ],
                    [
                        'title' => Yii::t('app', 'Admin panel'),
                        'url' => Url::to('admin'),
                    ],
                ],
                'auth' => [
                    'navs' => [
                        [
                            'title' => Yii::t('app', 'Sign out'),
                            'url' => Url::to('signout'),
                        ],
                    ]
                ]
            ],
            'user' => [
                'navs' => [
                    [
                        'title' => Yii::t('app', 'Home'),
                        'url' => Url::to('index'),
                    ],
                    [
                        'title' => Yii::t('app', 'About'),
                        'url' => Url::to('about'),
                    ],
                    [
                        'title' => Yii::t('app', 'My games'),
                        'url' => Url::to('games/index'),
                    ],
                ],
                'auth' => [
                    [
                        'title' => Yii::t('app', 'Sign out'),
                        'url' => Url::to('signout'),
                    ],
                ]
            ],
            '?' => [
                'navs' => [
                    [
                        'title' => Yii::t('app', 'Home'),
                        'url' => Url::to('index'),
                    ],
                    [
                        'title' => Yii::t('app', 'About'),
                        'url' => Url::to('about'),
                    ],
                ],
                'auth' => [
                    [
                        'title' => Yii::t('app', 'Sign in'),
                        'url' => Url::to('signin'),
                    ],
                    [
                        'title' => Yii::t('app', 'Sign up'),
                        'url' => Url::to('signup'),
                    ],
                ]
            ],
        ];
    }

    /**
     * Метод возвращает навигацию пользователя
     * @param string $userRole
     * @return mixed
     */
    private static function getNavigateByUserRole(string $userRole = '?'): array
    {
        return self::getNavigates()[$userRole];
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $user = Yii::$app->user->identity;

        if ($user === null) {
            $navs = self::getNavigateByUserRole();
        } else {
            $navs = self::getNavigateByUserRole($user->role);
        }


        return $this->render('fronted_menu', [
            'navs' => $navs,
        ]);
    }
}
