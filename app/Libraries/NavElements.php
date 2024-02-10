<?php

namespace App\Libraries;

class NavElements
{

    public static function font_library()
    {

        $arr = [
            [
                'name' => 'Home',
                'icon' => '<i class="fa-solid fa-house fa-lg"></i>',
                'route' => '#',
            ],
            [
                'name' => 'Products',
                'icon' => '<i class="fa-solid fa-boxes-stacked fa-lg"></i>',
                'route' => '#',
            ],
            [
                'name' => 'Profile',
                'icon' => '<i class="fa-solid fa-user fa-lg"></i>',
                'route' => '#',
            ]
        ];
    }
}
