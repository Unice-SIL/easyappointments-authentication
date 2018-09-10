<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      F.Casazza <frederic.casazza@unice.fr>
 * ---------------------------------------------------------------------------- */

/**
 * Authentication Controller
 *
 * @package Controllers
 */
Class Authentication extends CI_Controller {
    /**
     * Class Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Set user's selected language.
        if ($this->session->userdata('language')) {
            $this->config->set_item('language', $this->session->userdata('language'));
            $this->lang->load('translations', $this->session->userdata('language'));
        } else {
            $this->lang->load('translations', $this->config->item('language')); // default
        }
        $dest_url = $this->session->userdata('dest_url');
        if (empty($dest_url)) {
            $this->session->set_userdata('dest_url', site_url('backend'));
        }
        $this->_load_authenticator();
        $this->_load_provider();
    }

    /**
     * @throws Exception
     */
    private function _load_authenticator(){
        $authentication = defined("Config::AUTHENTICATION_CLASS")? Config::AUTHENTICATION_CLASS : 'authentication/BasicAuthentication/BasicAuthentication';
        $this->load->file(APPPATH.'core/authentication/AuthenticationInterface.php');
        $this->load->library($authentication, array(), 'authentication');
        if(!($this->authentication instanceof AuthenticationInterface)) throw new Exception ('The class '.get_class($this->authentication).' must implements AuthenticationInterface');
    }

    /**
     * @throws Exception
     */
    private function _load_provider(){
        $provider = defined("Config::USER_PROVIDER_CLASS")? Config::USER_PROVIDER_CLASS : 'provider/DbUserProvider/DbUserProvider';
        $this->load->file(APPPATH.'core/provider/UserProviderInterface.php');
        $this->load->file(APPPATH.'core/provider/UserInterface.php');
        $this->load->file(APPPATH.'core/provider/User.php');
        $this->load->library($provider, array(), 'user_provider');
        if(!($this->user_provider instanceof UserProviderInterface)) throw new Exception ('The class '.get_class($this->provider).' must implements UserProviderInterface');
    }

    /**
     * @param UserInterface $user
     */
    private function _set_user_data(UserInterface $user){
        $this->session->set_userdata('user_id', $user->getId());
        $this->session->set_userdata('user_email', $user->getEmail());
        $this->session->set_userdata('role_slug', $user->getRole());
        $this->session->set_userdata('username', $user->getUsername());
        $this->session->set_userdata('first_name', $user->getFirstName());
        $this->session->set_userdata('last_name', $user->getLastName());
    }

    /**
     *
     */
    private function _unset_user_data(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('role_slug');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('dest_url');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('last_name');
    }

    /**
     * Default Method
     *
     * The default method will redirect the browser to the authentication/login URL.
     */
    public function index() {
        header('Location: ' . site_url('authentication/login'));
    }

    /**
     * @return mixed
     */
    public function login() {
        $username = $this->authentication->login();
        if($username === FALSE){
            $this->authentication->on_authentication_failure();
        }elseif (!empty($username)){
            $user = $this->user_provider->loadUserByUsername($username);
            if($user instanceof UserInterface) {
                $this->_set_user_data($user);
            }else {
                $this->_set_user_data(new User($username, $username));
            }
            $this->authentication->on_authentication_success();
        }
    }

    /**
     * Display the logout page.
     */
    public function logout() {
        $this->_unset_user_data();
        $this->authentication->logout();
    }

    /**
     * Display the "forgot password" page.
     */
    public function forgot_password() {
        $this->authentication->forgot_password();
    }

    /**
     * Display the "not authorized" page.
     */
    public function no_privileges() {
        $this->load->model('settings_model');
        $view['base_url'] = $this->config->item('base_url');
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('authentication/no_privileges', $view);
    }
}