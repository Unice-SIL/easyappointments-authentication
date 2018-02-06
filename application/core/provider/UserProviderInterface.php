<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

Interface UserProviderInterface {
    /**
     * Load the user properties by username
     * @param $username
     * @return UserInterface
     */
    public function loadUserByUsername($username);
}