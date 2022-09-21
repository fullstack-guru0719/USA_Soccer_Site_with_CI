<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

    public function login($user)
    {
        // compare the username
        $query = $this->db->query("SELECT * FROM users WHERE username = '" . $user['username'] . "'");

        $user_info = $query->result_array();
        if (count($user_info) > 0)
        {
            $query = $this->db->query("SELECT * FROM users WHERE username ='" . $user['username'] . "' and password = MD5('" . $user['password'] . "')");

            $user_info = $query->result_array();

            //compare the password
            if (count($user_info) > 0)
            {
                $this->db->query("UPDATE users SET last_logedin = NOW()");
                return array('success'=>true,'user_info'=>$user_info[0]);
            }
            else
            {
                return array('success'=>false,'message'=>'Password you typed in is incorrect');
            }
        }
        else
        {
            return array('success'=>false,'message'=>'Username you typed in is incorrect');
        }
    }

    public function checkLogin($id, $username)
    {
        $query = $this->db->query('SELECT * from users where id = "'. $id .'" and username = "'. $username .'"');

        $user_info = $query->result_array();

        if (count($user_info) > 0)
        {
            return true;            
        }
        else
        {
            return false;
        }
    }

    public function register($user)
    {
        $field = array();
        $value_field = array();

        $valid_user = $this->user_exist($user);
        if ($valid_user['exist'])
        {
            return array('success'=>false,'error_message'=>$valid_user['exist_type']. ' is already exist, please retry again with another ' . $valid_user['exist_type']);
        }
        
        foreach($user as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            if ($key == 'password')
            {
                $value_fields = 'MD5("' . $value . '")';
            }
            else if ($key == 'rpassword' || $key == 'tnc')
            {
                continue;
            }
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO users (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");
        $result = $this->db->insert_id();
        $query = $this->db->query("SELECT * FROM users WHERE id ='" . $result . "'");
        $user_info = $query->result_array();
        $this->db->query("UPDATE users SET last_logedin = NOW()");
        return array('success'=>true,'message'=>'User have registered successfully','id'=>$result,'user_info'=>$user_info[0]);
    }

    public function update_profile($id,$user)
    {
        $query = $this->db->query("SELECT * FROM users WHERE NOT id = '$id' AND ( username = '" . $user['username'] . "' OR email = '" . $user['email'] . "')");
        $real_user = $query->result_array();
        if (count($real_user) > 0)
        {
            if ($real_user[0]['username'] == $user['username'])
            {
                return array('success'=>false,'message'=>'Username is already exist, please retry again with another Username');
            }
            else
            {
                return array('success'=>false,'message'=>'Email is already exist, please retry again with another Email');
            }
        } else {
            
            $value_field = array();
            foreach($user as $key => $value)
            {
                $value_fields = $key . '="' . $value .'"';

                if ($key == 'password')
                {
                    $value_fields = $key . '=' . 'MD5("' . $value . '")';
                }
                array_push($value_field , $value_fields);
            }
            $this->db->query("UPDATE users SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '$id'");
            return array('success'=>true,'message'=>'User have updated successfully');
        }
    }

    public function add_user($user)
    {
        $field = array();
        $value_field = array();

        $valid_user = $this->user_exist($user);
        if (isset($valid_user['exist']) && $valid_user['exist'])
        {
            return array('success'=>false,'message'=>$valid_user['exist_type']. ' is already exist, please retry again with another ' . $valid_user['exist_type']);
        }
        
        if(isset($user['password']) && !empty($user['password']))
        {
            $user['password'] = md5($user['password']);
        }

        $this->db->insert('users',$user);

        return array('success'=>true,'message'=>'User have added successfully');
    }

    public function update_user($user)
    {
        $query = $this->db->query("SELECT * FROM users WHERE NOT id = '" . $user['id'] . "' AND ( username = '" . $user['username'] . "' OR email = '" . $user['email'] . "')");
        $real_user = $query->result_array();
        if (count($real_user) > 0)
        {
            if ($real_user[0]['username'] == $user['username'])
            {
                return array('success'=>false,'message'=>'Username is already exist, please retry again with another Username');
            }
            else
            {
                return array('success'=>false,'message'=>'Email is already exist, please retry again with another Email');
            }
        } else {
            
            $value_field = array();
            foreach($user as $key => $value)
            {
                if ( $key == 'id')
                    continue;
                $value_fields = $key . '="' . $value .'"';

                if ($key == 'password')
                {
                    $value_fields = $key . '=' . 'MD5("' . $value . '")';
                }
                array_push($value_field , $value_fields);
            }
            $this->db->query("UPDATE users SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $user['id'] . "'");
            return array('success'=>true,'message'=>'User have updated successfully');
        }
    }

    public function delete_user($id)
    {
        $query = $this->db->query("DELETE FROM users WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'User have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function add_role($role)
    {
        $field = array();
        $value_field = array();
        
        foreach($role as $key => $value)
        {
            $value_fields = '"' . $value . '"';
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO user_group (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Role have added successfully');
    }

    public function update_role($role)
    {
        $value_field = array();
        foreach($role as $key => $value)
        {
            if ( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field , $value_fields);
        }
        $this->db->query("UPDATE user_group SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $role['id'] . "'");
        return array('success'=>true,'message'=>'Role have updated successfully');
    }

    public function delete_role($id)
    {
        $query = $this->db->query("DELETE FROM user_group WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Role have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function add_option($option)
    {
        $field = array();
        $value_field = array();
        
        foreach($option as $key => $value)
        {
            $value_fields = $value;
            if($key != 'cost' && $key != 'status')
            {
                $value_fields = "'" . $value . "'";
            }
            array_push($field,'`'.$key.'`');
            array_push($value_field , $value_fields);
        }

        array_push($field,'`create_date`');
        array_push($value_field,'NOW()');
        array_push($field,'`update_date`');
        array_push($value_field,'NOW()');


        $this->db->query("INSERT INTO player_option (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");


        return array('success'=>true,'message'=>'Option have added successfully');
    }

    public function update_option($option)
    {
        $value_field = array();
        foreach($option as $key => $value)
        {
            if ( $key == 'id')
                continue;

            $value_fields = $value;
            if($key != 'cost' && $key != 'status')
            {
                $value = "'" . $value . "'";
            }
            $value_fields = '`'.$key.'`' . '=' . $value;

            array_push($value_field , $value_fields);
        }
        $this->db->query("UPDATE player_option SET " . join(',', $value_field) . ", `update_date` = NOW() WHERE id = '" . $option['id'] . "'");
        return array('success'=>true,'message'=>'Option have updated successfully');
    }

    public function delete_option($id)
    {
        $query = $this->db->query("DELETE FROM player_option WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Option have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function add_staff($staff)
    {
        $field = array();
        $value_field = array();

        $valid_user = $this->user_exist($staff);
        if ($valid_user['exist'])
        {
            return array('success'=>false,'message'=>$valid_user['exist_type']. ' is already exist, please retry again with another ' . $valid_user['exist_type']);
        }
        
        foreach($staff as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            if ($key == 'password')
            {
                $value_fields = 'MD5("' . $value . '")';
            }
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO users (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Staff have added successfully');
    }

    public function update_staff($staff)
    {
        $query = $this->db->query("SELECT * FROM users WHERE NOT id = '" . $staff['id'] . "' AND ( username = '" . $staff['username'] . "' OR email = '" . $staff['email'] . "')");
        $real_staff = $query->result_array();
        if (count($real_staff) > 0)
        {
            if ($real_staff[0]['username'] == $staff['username'])
            {
                return array('success'=>false,'message'=>'Username is already exist, please retry again with another Username');
            }
            else
            {
                return array('success'=>false,'message'=>'Email is already exist, please retry again with another Email');
            }
        } else {
            
            $value_field = array();
            foreach($staff as $key => $value)
            {
                if ( $key == 'id')
                    continue;
                $value_fields = $key . '="' . $value .'"';

                if ($key == 'password')
                {
                    $value_fields = $key . '=' . 'MD5("' . $value . '")';
                }
                array_push($value_field , $value_fields);
            }
            $this->db->query("UPDATE users SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $staff['id'] . "'");
            return array('success'=>true,'message'=>'Staff have updated successfully');
        }
    }

    public function delete_staff($id)
    {
        $query = $this->db->query("DELETE FROM users WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Staff have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function user_exist($user)
    {
        $query = $this->db->query("SELECT * FROM users WHERE username = '" . $user['username'] . "' OR email = '" . $user['email'] . "'");

        $real_user = $query->result_array();

        if (count($real_user) > 0)
        {
            if ($real_user[0]['username'] == $user['username'])
            {
                return array('exist'=>true,'exist_type'=>'Username');
            }
            else
            {
                return array('exist'=>true,'exist_type'=>'Email');
            }
        }
    }

    public function update_player($player)
    {
        $value_field = array();
        foreach($player as $key => $value)
        {
            if ( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE users SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $player['id'] . "'");
        return array('success'=>true,'message'=>'Player have updated successfully');
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM users WHERE id = '$id'");
        return $query->result_array();
    }

    public function get_all_user()
    {
        $query = $this->db->query("SELECT * FROM users");
        return $query->result_array();
    }

    public function get_all_coach()
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_group = 2");
        return $query->result_array();
    }

    public function get_admin_coach()
    {
        $query = $this->db->query("SELECT * FROM users WHERE NOT user_group = 4 AND NOT user_group = 3");
        return $query->result_array();
    }

    public function get_all_player()
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_group = 4");
        return $query->result_array();
    }

    public function get_main_player()
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_group = 4 AND member_type = 'Main'");
        return $query->result_array();
    }

    public function get_sub_player()
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_group = 4 AND member_type = 'Substitus'");
        return $query->result_array();
    }

    public function get_all_pending()
    {
        $query = $this->db->query("SELECT * FROM users WHERE user_group = 4 AND status = 0");
        return $query->result_array();
    }

    public function get_all_usergroup()
    {
        $query = $this->db->query("SELECT * FROM user_group");
        return $query->result_array();
    }

    public function get_all_playeroption()
    {
        $query = $this->db->query("SELECT * FROM player_option");
        return $query->result_array();
    }

    public function get_active_option()
    {
        $query = $this->db->query("SELECT * FROM player_option WHERE status = 1");
        return $query->result_array();
    }

    // public function forgetpassword($data)
    // {
    //     $query = $this->db->query("SELECT * FROM users WHERE email = '" . $data['email']. "'");
    //     $user_info = $query->result_array();

    //     if (count($user_info) > 0)
    //     {
    //         return array('success'=>true,'user_info'=>$user_info[0]);
    //     }
    //     else
    //     {
    //         return array('success'=>false,'message'=>'Such User is not exist');
    //     }
    // }

    // public function resetpassword($data,$id)
    // {
    //     $this->db->query("UPDATE users SET password = MD5('" . $data['password'] . "') WHERE id = " . $id);
    //     return array('success'=>true);
    // }

    // public function update($user,$id)
    // {
    //     $query = $this->db->query("SELECT * FROM users WHERE NOT id = '$id' AND ( username = '" . $user['username'] . "' OR email = '" . $user['email'] . "')");
    //     $real_user = $query->result_array();
    //     if (count($real_user) > 0)
    //     {
    //         if ($real_user[0]['username'] == $user['username'])
    //         {
    //             return array('success'=>false,'message'=>'Username is already exist, please retry again with another Username');
    //         }
    //         else
    //         {
    //             return array('success'=>false,'message'=>'Email is already exist, please retry again with another Email');
    //         }
    //     } else {
            
    //         $value_field = array();
    //         foreach($user as $key => $value)
    //         {
    //             $value_fields = $key . '="' . $value .'"';

    //             if ($key == 'password')
    //             {
    //                 $value_fields = $key . '=' . 'MD5("' . $value . '")';
    //             }
    //             array_push($value_field , $value_fields);
    //         }
    //         $this->db->query("UPDATE users SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '$id'");
    //         return array('success'=>true,'message'=>'User have updated successfully');
    //     }
    // }

    // public function delete($id)
    // {
    //     $query = $this->db->query("DELETE FROM users WHERE id = " . $id);
    //     if ($query) {
    //         return array('success'=>true, 'message'=>'User have deleted successfully');
    //     } else {
    //         return array('success'=>false,'message'=>'Database error');
    //     }
    // }

    public function delete_all_user($data)
    {
        if(count($data) > 0)
        {
            $query = $this->db->query("DELETE FROM users WHERE id in (" . join(',',$data) . ")");
        }
        if ($query) {
            return array('success'=>true, 'message'=>'All User have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function delete_all_staff($data)
    {
        if(count($data) > 0)
        {
            $query = $this->db->query("DELETE FROM users WHERE id in (" . join(',',$data) . ")");
        }
        if ($query) {
            return array('success'=>true, 'message'=>'All Staff have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_inactive_all_players($id)
    {
        if($id){

            $player_array = $this->db->query('SELECT user_id FROM pendings WHERE fee_id = '. $id )->result_array();
            
            $players = array();
            if (count($player_array)) {
                foreach($player_array as $key => $value)
                {
                    array_push($players, $value['user_id']);
                }

                if(count($players) > 0)
                {
                    $players = $this->db->query('SELECT * FROM users WHERE id NOT in (' . join(',',$players) . ') AND user_group = 4')->result_array();
                } else {
                    $players = $this->db->query('SELECT * from users WHERE user_group = 4')->result_array();
                }
            } else {
                $players = $this->db->query('SELECT * from users WHERE user_group = 4')->result_array();
            }
            return $players;
        } else {
            $query = $this->db->query('SELECT * from users WHERE user_group = 4');
            return $query->result_array();
        }
    }
}
