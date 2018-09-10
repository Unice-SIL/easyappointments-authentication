<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

defined('BASEPATH') OR exit('No direct script access allowed');

Class DbUser extends User {
    /**
     * DbUser constructor.
     * @param $data
     * @param $mapping
     */
    public function __construct($data, $mapping)
    {
        $this->id = (isset($mapping['id']) && isset($data[$mapping['id']]))? $data[$mapping['id']] : null;
        $this->username = (isset($mapping['username']) && isset($data[$mapping['username']]))? $data[$mapping['username']] : null;
        $this->first_name = (isset($mapping['first_name']) && isset($data[$mapping['first_name']]))? $data[$mapping['first_name']] : null;
        $this->last_name = (isset($mapping['last_name']) && isset($data[$mapping['last_name']]))? $data[$mapping['last_name']] : null;
        $this->email = (isset($mapping['email']) && isset($data[$mapping['email']]))? $data[$mapping['email']] : null;
        $this->role = (isset($mapping['role_slug']) && isset($data[$mapping['role_slug']]))? $data[$mapping['role_slug']] : null;
    }
}