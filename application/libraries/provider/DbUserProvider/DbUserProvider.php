<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

defined('BASEPATH') OR exit('No direct script access allowed');

Class DbUserProvider implements UserProviderInterface {

    protected $CI;
    protected $db_user_provider_model;
    protected $db_user_provider_model_method;
    protected $db_user_provider_username;
    protected $db_user_provider_user_attributes_mapping;
    protected $user_attributes_mapping = array(
        'username'      => 'username',
        'id'            => 'user_id',
        'email'         => 'user_email',
        'role_slug'     => 'role_slug'
    );

    /**
     * BasicUserProvider constructor.
     */
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->add_package_path(__DIR__);
        $this->db_user_provider_model = defined('Config::DB_USER_PROVIDER_MODEL')? Config::DB_USER_PROVIDER_MODEL : 'DbUser_model';
        $this->db_user_provider_model_method = defined('Config::DB_USER_PROVIDER_MODEL_METHOD')? Config::DB_USER_PROVIDER_MODEL_METHOD : 'find_user_by_username';
        //$this->db_user_provider_username = defined('Config::DB_USER_PROVIDER_USERNAME')? Config::DB_USER_PROVIDER_USERNAME : 'username';
        $this->db_user_provider_user_attributes_mapping = defined('Config::DB_USER_PROVIDER_USER_ATTRIBUTES_MAPPING')? Config::DB_USER_PROVIDER_USER_ATTRIBUTES_MAPPING : array();
        //$this->db_user_provider_user_attributes_mapping['username'] = $this->db_user_provider_username;
        $this->user_attributes_mapping = array_merge($this->user_attributes_mapping, $this->db_user_provider_user_attributes_mapping);
    }

    /**
     * Load the user properties by username
     * @param $username
     * @return UserInterface
     */
    public function loadUserByUsername($username)
    {
        $this->CI->load->file(__DIR__.'/DbUser.php');
        $this->CI->load->model($this->db_user_provider_model, 'dbuser_model');
        $method = $this->db_user_provider_model_method;
        $user_data = $this->CI->dbuser_model->$method($username);
        return !empty($user_data)? new DbUser($user_data, $this->user_attributes_mapping) : null;
    }
}