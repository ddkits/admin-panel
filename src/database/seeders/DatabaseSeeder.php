<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Ddkits\Adminpanel\Models\Menus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Ddkits\Adminpanel\Models\Profiles;
use Ddkits\Adminpanel\Models\Settings;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->command->info('DDkits Platform Installation!');
        $this->command->info('DDkits Platform Settings!');
        $this->DDkitsSettings();
        $this->command->info('DDkits Platform Roles!');
        $this->DDkitsRoles();
        $this->command->info('DDkits Platform Menus!');
        $this->DDkitsMenus();
        $this->command->info('DDkits Platform Users!');
        $this->DDkitsUsers();
        $this->command->info('DDkits Platform Main Admin!');
        $this->DDkitsAdmin();
    }

    // settings insert

    public function DDkitsSettings()
    {
        Model::unguard();
        $settingsIN = new Settings;
        // Adding main setting's and main's configurations
        $settings = [
            [
                'id' => 1,
                'field_name' => 'sitename',
                'value' => 'API Documentation Pro',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'id' => 2,
                'field_name' => 'description',
                'value' => 'Example of Description',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'field_name' => 'main_keywords',
                'value' => 'Example of keywords',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'field_name' => 'adsense',
                'value' => 'UA-XXXXX-X',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'field_name' => 'google_analytic',
                'value' => 'UA-XXXXX-X',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 6,
                'field_name' => 'google_analytic_g',
                'value' => 'G-XXXXXX',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // [
            //     'id' => 6,
            //     'field_name' => 'github',
            //     'value' => 'https://github.com/',
            //     'type' => 'settings',
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'id' => 7,
            //     'field_name' => 'twitter',
            //     'value' => 'https://twitter.com/',
            //     'type' => 'settings',
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'id' => 8,
            //     'field_name' => 'facebook',
            //     'value' => 'https://facebook.com/',
            //     'type' => 'settings',
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],
            [
                'id' => 9,
                'field_name' => 'homepage_image',
                'value' => '/img/homeHeader.png',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 10,
                'field_name' => 'sitelogo',
                'value' => 'DDkits',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 11,
                'field_name' => 'btn1-text',
                'value' => 'Get Started',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 12,
                'field_name' => 'btn1-id',
                'value' => 'DDkits-download',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 13,
                'field_name' => 'btn2-id',
                'value' => 'DDkits-advantages-outer',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 14,
                'field_name' => 'btn2-text',
                'value' => 'Examples',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 15,
                'field_name' => 'openapi-example',
                'value' => '#',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 16,
                'field_name' => 'restapi-example',
                'value' => '#',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 17,
                'field_name' => 'asyncapi-example',
                'value' => '#',
                'type' => 'settings',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 100,
                'field_name' => 'powered_by',
                'value' => 'DDkits.com',
                'type' => ' ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];
        foreach ($settings as $setting) {
            $settingsIN->insert($setting);
        }
    }

    public function DDkitsRoles()
    {
        Model::unguard();
        $roles = [
            ["title" => 'Guest', 'body' => 'Guest users role'],
            ["title" => 'Member', 'body' => 'Member users role'],
            ["title" => 'Admin', 'body' => 'Admin users role'],

        ];
        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }

    public function DDkitsMenus()
    {
        Model::unguard();
        $menuList = new Menus;
        // Adding main admin's and main's menu links
        $menus = [
            ['id'=>1, 'weight' => 1, 'description' => 'Admin page', 'menu' => 'adminmenu', 'menuparent' => null, 'name' => 'Admin', 'link' => '/admin', 'iconclass' => 'fa-folder',
            'class' => 'nav-link'],

            ['id'=>2,'weight' => 2, 'description' => 'Menu Admin page', 'menu' => 'adminmenu', 'menuparent' => 1, 'name' => 'Menus', 'link' => '/admin/menus', 'iconclass' => 'fa-wrench',
            'class' => 'nav-link'],

            ['id'=>3,'weight' => 3, 'description' => 'Menu create page', 'menu' => 'adminmenu', 'menuparent' => 2, 'name' => 'New menu', 'link' => '/admin/menus/create', 'iconclass' => 'fa-wrench',
            'class' => 'nav-link'],

            // messages menu
            // ['id'=>7,'weight'=>3, 'description'=>'Messages', 'menu'=>'mainmenu', 'menuparent'=>null, 'name'=>'Messages', 'link'=>'/messages', 'iconclass'=>'fa fa-envelope-o', 'class'=>'menu'],

            // ['id'=>8,'weight'=>1, 'description'=>'New Message', 'menu'=>'mainmenu', 'menuparent'=>7, 'name'=>'New Message', 'link'=>'/messages/create', 'iconclass'=>'', 'class'=>'menu'],

            // ['id'=>9,'weight'=>2, 'description'=>'Inbox', 'menu'=>'mainmenu', 'menuparent'=>7, 'name'=>'Inbox', 'link'=>'/messages', 'iconclass'=>'', 'class'=>'menu'],

            // ['id'=>10,'weight'=>3, 'description'=>'Outbox', 'menu'=>'mainmenu', 'menuparent'=>7, 'name'=>'Outbox', 'link'=>'/messages/outbox', 'iconclass'=>'', 'class'=>'menu'],

            ['id'=>4,'weight' => 4, 'description' => 'Settings', 'menu' => 'adminmenu', 'menuparent' => 1, 'name' => 'Settings', 'link' => '/admin/private/settings', 'iconclass' => 'fa-wrench',
            'class' => 'nav-link'],

            // API Doc Pro Dash Menus

        ];
        foreach ($menus as $menu) {
            $menuList->insert($menu);
            // DB::table('menus')->insert();
        }
    }
    public function DDkitsUsers()
    {
        Model::unguard();
        $userIN = new User();
        $profilesIN = new Profiles();
        // Adding main admin's and main's user links
        $users = [
            [
                'email' => 'melayyoub@outlook.com',
                'firstname' => 'Sam',
                'lastname' => 'Ayoub',
                'job_title' => 'Admin',
                'industry' => 'DDkits',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'api_token' => bcrypt('DDkits'),
                'api_id' => bcrypt('DDkits'),
                'profile' => 1,
                'password' => bcrypt('DDKits'),
                'ip' => \Request::ip(),
                'role' => 0,
                'level' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];
        $profiles = [
            [
                'uid' => 1,
                'picture' => 'members/img/undraw_profile.svg',
            ],
        ];

        foreach ($users as $user) {
            $userIN->insert($user);
        }
        foreach ($profiles as $profile) {
            $profilesIN->insert($profile);
        }

    }
    public function DDkitsAdmin()
    {
        Model::unguard();

        // Adding main admin's and main's admin links
        $admins = [
            [
                'uid' => 1,
                'level' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ];
        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}

