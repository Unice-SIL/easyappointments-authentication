<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

Interface UserInterface {
    /**
     * Get user id
     * @return mixed
     */
    public function getId();

    /**
     * Get username
     * @return mixed
     */
    public function getUsername();

    /**
     * Get user email
     * @return mixed
     */
    public function getEmail();

    /**
     * Get user role slug
     * @return mixed
     */
    public function getRole();
}