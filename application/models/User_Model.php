<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Galeria
 *
 */
class User_Model extends CI_Model
{
    private $table_name			= 'user';

    private $profile_table                  = 'user_profile';

    function __construct()
    {
        parent::__construct();
    }

    function login( $username, $password )
    {
        $param['username'] = $this->db->escape($username);
        $param['password'] = $password;

        $sql = "SELECT `user_id`, `roleID` FROM `user` WHERE username=? AND password=?";
        $query = $this->db->query( $sql, $param );

        if ($query->num_rows() > 0) {
           $row = $query->row( );
           $data['user_id'] = $row->user_id;
           $data['role_id'] = $row->roleID;
        }

        return $data;
    }

    function crearUsuario( $name, $username, $password, $email )
    {
        if( usuario_existe( $username ) ) {
            return array('user_id' => -1 );
        }

        $role_id = getDefaultRole( );

        $data['name'] = $this->db->escape($name);
        $data['username'] = $this->db->escape($username);
        $data['password'] = $password;
        $data['email'] = $this->db->escape($email);
        $data['roleID'] = $role_id;

        if ($this->db->insert($this->table_name, $data)) {
                $user_id = $this->db->insert_id();
                return array('user_id' => $user_id);
        }
    }

    function crearUsuarioAdmin( $name, $username, $password, $email, $role, $admin, $adminPass )
    {
        if( usuario_existe( $username ) ) {
            return array('user_id' => -1 );
        }

        if( ! admin($admin, $adminPass) ){
            return array('user_id' => -2 );
        }

        $role_id = getRoleID( $role );

        $data['name'] = $this->db->escape($name);
        $data['username'] = $this->db->escape($username);
        $data['password'] = $password;
        $data['email'] = $this->db->escape($email);
        $data['roleID'] = $role_id;

        if ($this->db->insert($this->table_name, $data)) {
                $user_id = $this->db->insert_id();
                return array('user_id' => $user_id);
        }
    }

    /**
    function changePassword( $username, $password, $newPassword )
    {
        if( isset(login($username, $password)))
        {
            $this->db->where( 'username', $this->db->escape($username) );
            $this->db->update( 'password', password_hash( $newPassword, PASSWORD_BCRYPT));
        }
    } */

    function usuario_existe( $username )
    {
        $sql = "SELECT `id` FROM user WHERE username = ?";
        $query = $this->db->query( $sql, array( $this->db->escap($username)));

        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function getDefaultRole(  )
    {
        $sql = "SELECT `role_id` FROM role WHERE default=1";
        $query = $this->db->query( $sql );
        $row = $query->row( );
        return $row->role_id;
    }

    function getRoleID( $role  )
    {
        $sql = "SELECT `role_id` FROM role WHERE role=?";
        $query = $this->db->query( $sql, array($role) );
        $row = $query->row( );
        return $row->role_id;
    }

    function getAdminRole(  )
    {
        $sql = "SELECT `role_id` FROM role WHERE `role`='admin'";
        $query = $this->db->query( $sql );
        $row = $query->row( );
        return $row->role_id;
    }

    function admin( $admin, $password )
    {
        $param['username'] = $this->db->escape($admin);
        $param['password'] = $password;

        $sql = "SELECT `roleID` FROM `user` WHERE username=? AND password=?";
        $query = $this->db->query( $sql, $param );

        if ($query->num_rows() > 0) {
           $row = $query->row( );
           if ( $row->role_id == getAdminRole( ) ){
               return true;
           }
        }

        return false;
    }
}
