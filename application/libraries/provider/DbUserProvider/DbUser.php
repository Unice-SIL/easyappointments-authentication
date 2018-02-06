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
        $this->id = $data[$mapping['id']];
        $this->username = $data[$mapping['username']];
        $this->first_name = $data[$mapping['first_name']];
        $this->last_name = $data[$mapping['last_name']];
        $this->email = $data[$mapping['email']];
        $this->role = $data[$mapping['role_slug']];
    }



}