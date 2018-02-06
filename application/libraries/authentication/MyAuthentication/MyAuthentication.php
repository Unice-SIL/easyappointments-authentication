<?php
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