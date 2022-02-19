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

```
php artisan vendor:publish
```
```
php artisan migrate
```
 
 
 
 done! 
 
 No need to worry about the DB structure of admins, will Be simple roles system to start from 
 
 Regards
 Sam Elayyoub
 DDKits.com
 
 
 ```
 "repositories": [
        {
            "type": "path",
            "url": "https://github.com/ddkits/admin-panel.git"
        }
    ],
```
