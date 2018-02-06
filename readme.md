## EASYAPPOINTMENTS AUTHENTICATION

This plugin modify the easyappointements authentication system. After installation you can configure the authentication and users provider mode.
By default BasicAuthentication and DbUserProvider is installed and used, but you can install or develop other authentications mode and users providers.

### DISCLAIMER
I developed and tested this plugin with easyappointments 1.2.1, I can't guarantee it will work with an other version.

### INSTALLATION
Put files in your easyappointments directory.
If for some reason you don't want overwrite the existing application files 'controllers/Backend.php' and 'view/backend/header.php' (if you used another version of easyappointments for example) you can keep it and just replace the following occurrences in files :
- replace 'user/login' by 'authentication/login'
- replace 'user/no_privileges' by 'authentication/no_privileges'
- replace 'user/logout' by 'authentication/logout'

### CONFIGURATION
To configure the plugin, edit the config.php file at the root of your application directory.

Define the authentication mode
```
// config.php
...
/**
 * The class used for authentication
 * Default = 'authentication/BasicAuthentication/BasicAuthentication'
 */
const AUTHENTICATION_CLASS = 'authentication/BasicAuthentication/BasicAuthentication';

```

Define the user provider
```
// config.php
...
/**
 * The class used for user provider
 * Default = 'provider/DbUserProvider/DbUserProvider'
 */
const USER_PROVIDER_CLASS = 'provider/DbUserProvider/DbUserProvider';

```

Configure the user provider
```
// config.php
..
/**
 * User model used
 * Default = 'DbUser_model'
 */
const DB_USER_PROVIDER_MODEL = 'DbUser_model';

/**
 * User model method used to find user by username
 * Default = 'find_user_by_username'
 */
const DB_USER_PROVIDER_MODEL_METHOD = 'find_user_by_username';

/**
 * Mapping between DbUser class attributes and user model field
 * Default = array(
 *                'username'      => 'username',
 *                'id'            => 'user_id',
 *                'email'         => 'user_email',
 *                'role_slug'     => 'role_slug'
 *            );
 */
const DB_USER_PROVIDER_USER_ATTRIBUTES_MAPPING = array(
    'username'      => 'username',
    'id'            => 'user_id',
    'email'         => 'user_email',
    'role_slug'     => 'role_slug'
);

```
