<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Bellezkin',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '&nbsp;<b>Bellezkin</b> Store',
    'logo_img' => 'assets/images/logo_b.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Bellezkin',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [

        [
            'text' => 'Dashboard',
            'url'  => 'admin/dashboard',
            'icon' => 'fas fa-fw fa-globe',
        ],

        // [
        //     'text' => 'search',
        //     'search' => true,
        //     'topnav' => true,
        // ],

        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],

        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],

        ['header' => 'MAIN MENU'],
        [
            'text' => 'Master',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-home',
            'submenu' => [
                [
                    'text' => 'Barang',
                    'url' => 'admin/barang'
                ],
                [
                    'text' => 'Supplier',
                    'url' => 'admin/supplier'
                ],
                [
                    'text' => 'Reseller',
                    'url' => 'admin/reseller'
                ],
                // moved to master barang
                // [
                //     'text' => 'Series',
                //     'url' => 'admin/series'
                // ],
                [
                    'text' => 'Bank',
                    'url' => 'admin/bank'
                ],
                [
                    'text' => 'Referral',
                    'url' => 'admin/referral'
                ],
                [
                    'text' => 'Setting',
                    'url' => 'admin/setting'
                ],
            ],
        ],
        [
            'text' => 'Order',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-shopping-bag',
            'submenu' => [
                [
                    'text' => 'Pemesanan',
                    'url' => 'admin/pemesanan'
                ],
                [
                    'text' => 'Konfirmasi pemesanan',
                    'url' => 'admin/konfirmasi-penjualan'
                ],
                [
                    'text' => 'Penjualan',
                    'url' => 'admin/penjualan'
                ],                
                [
                    'text' => 'Pembelian',
                    'url' => 'admin/pembelian'
                ],
                [
                    'text' => 'Movement',
                    'url' => 'admin/movement'
                ],


            ],
        ],
        [
            'text' => 'Bonus',
            'url'  => 'admin/bonus',
            'icon' => 'fas fa-fw fa-money-bill',
            'submenu' => [
                [
                    'text' => 'Qualified',
                    'url' => 'qualified'
                ],
                [
                    'text' => 'Cashback',
                    'url' => 'admin/cashback'
                ],
                [
                    'text' => 'Reward',
                    'url' => 'reward'
                ],
                [
                    'text' => 'Leadership',
                    'url' => 'leadership'
                ],
                [
                    'text' => 'Merchandise',
                    'url' => 'merchandise'
                ],

            ],
        ],
        [
            'text' => 'Finance',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-dollar-sign',
            'submenu' => [
                [
                    'text' => 'Cashbook',
                    'url' => 'cashbook'
                ],
                [
                    'text' => 'Pembayaran',
                    'url' => 'pembayaran'
                ],
                [
                    'text' => 'Saldo Member',
                    'url' => 'saldomember'
                ],


            ],
        ],
        [
            'text' => 'Retur',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-retweet',
            'submenu' => [
                [
                    'text' => 'Penjualan',
                    'url' => 'returpenjualan'
                ],
                [
                    'text' => 'Pembelian',
                    'url' => 'returpembelian'
                ],
                [
                    'text' => 'Movement',
                    'url' => 'returmovement'
                ],


            ],
        ],
        [
            'text' => 'Report',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-book-open',
            'submenu' => [
                [
                    'text' => 'Release Bonus',
                    'url' => 'release'
                ],
                [
                    'text' => 'Daily sales & Recruitment',
                    'url' => 'dailysales'
                ],

            ],
        ],


        ['header' => 'SETTINGS'],
        [
            'text' => 'Tools',
            'url'  => 'admin/master',
            'icon' => 'fas fa-fw fa-tools',
            'submenu' => [
                [
                    'text' => 'Adjusment',
                    'url' => 'admin/adjusment'
                ],
                [
                    'text' => 'SPB kontrol',
                    'url' => 'admin/barangspb'
                ],
                [
                    'text' => 'Calculate (barang)',
                    'url' => 'calculate'
                ],
                [
                    'text' => 'History Barang',
                    'url' => 'history'
                ],
                [
                    'text' => 'Send Email',
                    'url' => 'sendemail'
                ],
                [
                    'text' => 'Fix Columns',
                    'url' => 'fixcolumns'
                ],
            ],

        ],

        ['header' => 'STORE'],
        [
            'text' => 'Slider',
            'url'  => 'admin/slider',
            'icon' => 'fas fa-fw fa-image',
        ],
        // [
        //     'text' => 'Banner',
        //     'url'  => 'admin/banner',
        //     'icon' => 'fas fa-fw fa-tag',
        // ],        
        [
            'text' => 'Coupon',
            'url'  => 'admin/coupon',
            'icon' => 'fas fa-fw fa-tag',
        ],
        [
            'text' => 'Users',
            'url'  => 'admin/user',
            'icon' => 'fas fa-fw fa-users',
        ],
        // [
        //     'text' => 'Pendaftaran Member',
        //     'url'  => 'admin/daftar-member',
        //     'icon' => 'fas fa-fw fa-list',
        // ],
        [
            'text' => 'Konfirmasi Pendaftaran',
            'url'  => 'admin/konfirmasi-daftar',
            'icon' => 'fas fa-fw fa-book',
        ],

        ['header' => 'PROFILE'],
        [
            'text' => 'Logout',
            'url'  => '/logout',
            'icon' => 'fas fa-fw fa-power-off',
        ],
        [
            'text' => 'Frontpage',
            'url'  => '/',
            'icon' => 'fas fa-fw fa-desktop',
            'target' => '_blank'
        ],

        // [
        //     'text'    => 'multilevel',
        //     'icon'    => 'fas fa-fw fa-share',
        //     'submenu' => [
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //         [
        //             'text' => 'level_one',
        //             'url'  => '#',
        //         ],
        //     ],
        // ],

        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Popper' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//unpkg.com/@popperjs/core@2',
                ],
            ],
        ],
        'Bootstrap4' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
                ],
            ],
        ],
        'BootstrapConfirmation' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'Datepicker' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js',
                ],
            ],
        ],
        'Ckeditor' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.ckeditor.com/4.14.1/standard/ckeditor.js',
                ],
            ],
        ],
        'BootstrapFilesyle' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-filestyle/2.1.0/bootstrap-filestyle.min.js',
                ],
            ],
        ],
        'Popup' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
