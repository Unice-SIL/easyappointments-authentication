## EASYAPPOINTMENTS AUTHENTICATION

This plugin modify the easyappointements authentication system. After installation you can configure the authentication and users provider mode.
By default BasicAuthentication and DbUserProvider is installed and used, but you can install or develop other authentications mode and users providers.

### DISCLAIMER
I developed and tested this plugin with easyappointments 1.2.1, I can't guarantee it will work with another version.

### INSTALLATION
Put files in your easyappointments directory.
If for some reason you don't want overwrite the existing application files 'controllers/Backend.php' and 'view/backend/header.php' (if you used another version of easyappointments for example) you can keep it and just replace the following occurrences in files :
- replace 'user/login' by 'authentication/login'
- replace 'user/no_privileges' by 'authentication/no_privileges'
- replace 'user/logout' by 'authentication/logout'

### CONFIGURATION
To configure the plugin, edit the config.php file at the root of your application directory.

##### Define the authentication class to use
```
// config.php
...
/**
 * The class used for authentication
 * Default = 'authentication/BasicAuthentication/BasicAuthentication'
 */
const AUTHENTICATION_CLASS = 'authentication/BasicAuthentication/BasicAuthentication';

```

##### Define the user provider class to use
```
// config.php
...
/**
 * The class used for user provider
 * Default = 'provider/DbUserProvider/DbUserProvider'
 */
const USER_PROVIDER_CLASS = 'provider/DbUserProvider/DbUserProvider';

```

##### Configure the user provider
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

### DEVELOPERS
If you want develop your own authentication or user provider library follow these instructions

##### Authentication
###### Create a Authentication class
Create a directory in application/libraries that will contain your Authentication class. Your class need implements AuthenticationInterface.
```
<?php
// application/libraries/MyAuthentication/MyAuthentication.php

defined('BASEPATH') OR exit('No direct script access allowed');

Class MyAuthentication implements AuthenticationInterface {

    /**
     * Called for user authentication
     * Return null if form not submitted, FALSE if authentication failure, the username when authentication success
     * @return bool|null|String
     */
    public function login()
    {
        // TODO: Implement login() method.
    }

    /**
     * Called for user logout
     * @return null
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }

    /**
     * Called when authentication success
     * @return null
     */
    public function on_authentication_failure()
    {
        // TODO: Implement on_authentication_failure() method.
    }

    /**
     * Called when authentication failure
     * @return mixed
     */
    public function on_authentication_success()
    {
        // TODO: Implement on_authentication_success() method.
    }
}
```
Your class will used by Authentication controller for login/logout users on your platform.

###### Use your Authentication class
```
// config.php
...
const AUTHENTICATION_CLASS = 'authentication/MyAuthentication/MyAuthentication';

```

##### User Provider
###### Create a UserProvider class
Create a directory in application/libraries that will contain your UserProvider class. Your class need implements UserProviderInterface
```
<?php
// application/libraries/MyUserProvider/MyUserProvider.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MyUserProvider implements UserProviderInterface {

    /**
     * Load the user properties by username
     * @param $username
     * @return UserInterface
     */
    public function loadUserByUsername($username)
    {
        // TODO: Implement loadUserByUsername() method.
    }
}
```
The loadUserByUsername in your class will be called after user has logged in to get his attributes. This method must return an instance of UserInterface, so... 

###### Create a User class
In your directory, create a User class which must implements UserInterface.
```
<?php
// application/libraries/MyUserProvider/MyUser.php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MyUser implements UserInterface {
    protected $id;
    protected $username;
    protected $email;
    protected $role;

    /**
     * Get user id
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * Get username
     * @return mixed
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Get user email
     * @return mixed
     */
    public function getEmail()
    {
        // TODO: Implement getEmail() method.
    }

    /**
     * Get user role slug
     * @return mixed
     */
    public function getRole()
    {
        // TODO: Implement getRole() method.
    }
}
```
This class will be used by Authentication controller to set user data in session.

###### Use your UerProvider class
```
// config.php
...
const USER_PROVIDER_CLASS = 'provider/MyUserProvider/MyUserProvider';

### REPORT AN ISSUE
Send me an email to frederic.casazza@unice.fr
