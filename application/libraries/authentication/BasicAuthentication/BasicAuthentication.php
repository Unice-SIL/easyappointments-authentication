<?php
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

defined('BASEPATH') OR exit('No direct script access allowed');

Class BasicAuthentication implements AuthenticationInterface {

    protected $CI;
    protected $basic_user_model;
    protected $basic_username_field;

    /**
     * Authentication constructor.
     */
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->add_package_path(__DIR__);
        $this->basic_user_model = defined('Config::BASIC_USER_MODEL')? Config::BASIC_USER_MODEL : 'user_model';
        $this->basic_username_field = defined('Config::BASIC_USERNAME_FIELD')? Config::BASIC_USERNAME_FIELD : 'username';
    }

    /**
     * Called for user authentication
     * Return null if form not submitted, FALSE if authentication failure, the username when authentication success
     * @return bool|null|String
     */
    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            return $this->_check_login();
        }
        return $this->_login_form();
    }

    /**
     * Display the logout page.
     */
    public function logout() {
        $this->CI->load->view('logout');
    }

    /**
     *
     */
    public function on_authentication_failure()
    {
        echo json_encode(AJAX_FAILURE);
    }

    /**
     *
     */
    public function on_authentication_success()
    {
        echo json_encode(AJAX_SUCCESS);
    }

    /**
     * @return null
     */
    private function _login_form(){
        $this->CI->load->model('settings_model');
        $this->CI->load->view('login', array(
            'base_url'      => $this->CI->config->item('base_url'),
            'dest_url'      => $this->CI->session->userdata('dest_url'),
            'company_name'  => $this->CI->settings_model->get_setting('company_name')
        ));
        return null;
    }

    /**
     * @return String|bool
     */
    private function    _check_login(){
        $this->CI->load->model($this->basic_user_model, 'user_model');
        $user_data = $this->CI->user_model->check_login($_POST['username'], $_POST['password']);
        return !empty($user_data)? $user_data[$this->basic_username_field] : FALSE;
    }


}