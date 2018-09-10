<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

class User implements UserInterface {
    protected $id;
    protected $username;
    protected $email;
    protected $role;
    protected $first_name;
    protected $last_name;

    /**
     * User constructor.
     * @param $id
     * @param null $username
     * @param null $email
     * @param null $role
     */
    public function __construct($id, $username=null, $email=null, $role=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * Get the user id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the username
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the user email
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the user role slug
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the user first name
     * @return mixed
     */
    public function getFirstName(){
        return $this->first_name;
    }

    /**
     * Get the user laste name
     * @return mixed
     */
    public function getLastName(){
        return $this->last_name;
    }
}