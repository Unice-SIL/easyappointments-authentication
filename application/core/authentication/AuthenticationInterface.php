<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

Interface AuthenticationInterface{
    /**
     * Called for user authentication
     * Return null if form not submitted, FALSE if authentication failure, the username when authentication success
     * @return bool|null|String
     */
    public function login();
    /**
     * Called for user logout
     * @return null
     */
    public function logout();

    /**
     * Called when authentication success
     * @return null
     */
    public function on_authentication_failure();

    /**
     * Called when authentication failure
     * @return mixed
     */
    public function on_authentication_success();
}