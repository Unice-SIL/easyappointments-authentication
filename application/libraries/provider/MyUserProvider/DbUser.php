<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

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