<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class DbUser_Model extends CI_Model {


    public function find_user_by_username($username){
        $user_data = $this->db
            ->select('ea_users.id AS user_id, ea_users.first_name AS first_name, ea_users.last_name AS last_name, ea_users.email AS user_email, ea_roles.slug AS role_slug, ea_user_settings.username')
            ->from('ea_users')
            ->join('ea_roles', 'ea_roles.id = ea_users.id_roles', 'inner')
            ->join('ea_user_settings', 'ea_user_settings.id_users = ea_users.id')
            ->where('ea_user_settings.username', $username)
            ->get()->row_array();
        return ($user_data) ? $user_data : NULL;
    }
}