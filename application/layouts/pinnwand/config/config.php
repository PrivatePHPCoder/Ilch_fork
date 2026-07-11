<?php

/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Layouts\Pinnwand\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'name' => 'Pinnwand',
        'version' => '1.0.0',
        'ilchCore' => '2.2.0',
        'author' => 'PrivatePHPCoder',
        'link' => 'https://github.com/PrivatePHPCoder/Ilch_fork',
        'desc' => 'Das digitale Vereinsheim: Kreidetafel, Korkwand und angepinnte Notizen.',
        'layouts' => [
            'index_full' => [
                ['module' => 'user', 'controller' => 'panel'],
                ['module' => 'forum'],
                ['module' => 'guestbook'],
            ]
        ],
        'settings' => [
            'headertext' => [
                'type' => 'text',
                'default' => 'Unser Verein',
                'description' => 'headertextDesc',
            ],
            'subheadertext' => [
                'type' => 'text',
                'default' => 'Schön, dass du vorbeischaust!',
                'description' => 'subheadertextDesc',
            ],
        ],
    ];

    public function getUpdate($installedVersion)
    {
    }
}
