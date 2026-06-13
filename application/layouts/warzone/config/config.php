<?php

/**
 * @copyright Ilch 2
 * @package ilch
 */

namespace Layouts\Warzone\Config;

class Config extends \Ilch\Config\Install
{
    public $config = [
        'name' => 'Warzone Tactical',
        'version' => '1.0.0',
        'ilchCore' => '2.2.0',
        'author' => 'Ilch_fork',
        'link' => 'https://ilch.de',
        'desc' => 'Hochmodernes Tactical-Gaming-Layout (COD/Battlefield/CS-Stil), komplett eigenes CSS, 3-Spalten mit HUD-Header.',
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
                'default' => 'WARZONE',
                'description' => 'headertextdesc',
            ],
            'tagline' => [
                'type' => 'text',
                'default' => 'BORN FOR BATTLE',
                'description' => 'taglinedesc',
            ],
            'accentcolor' => [
                'type' => 'text',
                'default' => '#ff7a18',
                'description' => 'accentcolordesc',
            ],
            'slider1' => [
                'type' => 'mediaselection',
                'default' => 'application/layouts/clan3columns/img/slider/slider_1.jpg',
                'description' => 'img',
            ],
            'slider2' => [
                'type' => 'mediaselection',
                'default' => 'application/layouts/clan3columns/img/slider/slider_2.jpg',
                'description' => 'img',
            ],
            'slider3' => [
                'type' => 'mediaselection',
                'default' => 'application/layouts/clan3columns/img/slider/slider_3.jpg',
                'description' => 'img',
            ],
        ],
    ];

    public function getUpdate($installedVersion)
    {
    }
}
