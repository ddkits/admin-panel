DDKits Admin Panel built to simplyfiy the User admin panel and admins on any Laravel

The Admin Dashboard using the latest moderinization design to simplyfy the process, 

Features are:

1- Admin Dashboard 
2- Users Management
3- Menu Management 
...

The hooks of this plugin can be used in Views/Controllers and more to modify what Users can be doing what

Simple 
```
Composer require ddkits/admin-panel
```
Add provider to your Config App 

```
Ddkits\Adminpanel\AdminPanelServiceProvider::class,
```

In Database/Seeders after the step publish will have new seeder for roles and menus basic links, can be modified as needed.

```
php artisan vendor:publish
php artisan migrate
php artisan db:seed --class=AdminpanelSeeder // for basic roles and login
```

```
php artisan migrate
```
 
 
 Examples of use:
 ```
 @inject('menuLinks', 'Ddkits\Adminpanel\Controller\MenusController')
@inject('isAdmin', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('getInfo', 'Ddkits\Adminpanel\Controller\AdminPanelController')
@inject('msgsBar', 'Ddkits\Adminpanel\Controller\MsgsController')
@inject('profile', 'Ddkits\Adminpanel\Controller\ProfilesController')
 <!-- {{ $getInfo->getValue('sitename') }} -->
 ```
 
 
 done! 
 
 No need to worry about the DB structure of admins, will Be simple roles system to start from 
 
 Regards
 Sam Ayoub
 DDKits.com
