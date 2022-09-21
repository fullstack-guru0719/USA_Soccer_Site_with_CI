<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

    public function add_schedule($schedule)
    {
        $id = $schedule['id'];
        if(empty($schedule['id']))
        {
            unset($schedule['id']);
            $this->db->insert('schedules',$schedule);

            // check if team is already added in the standing
        }else{
            $this->db->where(['id' => $schedule['id']])->update('schedules',$schedule);
        }

        if($schedule['match_type'] != 'friendly')
        {
            $item = $this->db->where(['team_id' => $schedule['team_id'],'tournament_id' => $schedule['tournament_id']])->get('tournament_standings')->row();
            if(!$item)
            {
                $this->db->insert('tournament_standings',['team_id' => $schedule['team_id'],'tournament_id' => $schedule['tournament_id'],'total_points' => 0]);
            }
        }

        if($id)
        {
            $schedule['update_date'] = date('Y-m-d H:i:s');
            return array('success'=>true,'message'=>'Schedule have added successfully');
        }else{
            return array('success'=>true,'message'=>'Schedule have updated successfully');
        }
    }

    public function upload_schedule($schedule)
    {
        $id = $schedule['id'];
        if(empty($schedule['id']))
        {
            unset($schedule['id']);
            $this->db->insert('schedules',$schedule);

            // check if team is already added in the standing
        }else{
            $this->db->where(['id' => $schedule['id']])->update('schedules',$schedule);
        }

        if($id)
        {
            $schedule['update_date'] = date('Y-m-d H:i:s');
            return array('success'=>true,'message'=>'Schedule have added successfully');
        }else{
            return array('success'=>true,'message'=>'Schedule have updated successfully');
        }
    }

    public function update_schedule($schedule)
    {
        $value_field = array();
        foreach($schedule as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE schedules SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $schedule['id'] . "'");
        return array('success'=>true,'message'=>'Schedule have updated successfully');
    }

    public function delete_schedule($id)
    {
        $schedule = $this->db->where('id',$id)->get('schedules')->row();

        $query = $this->db->query("DELETE FROM schedules WHERE id = " . $id);


        if($schedule)
        {
            if($schedule->manual && file_exists(FCPATH.'uploads/'.$schedule->manual))
            {
                @unlink(FCPATH.'uploads/'.$schedule->manual);
            }
        }

        if ($query) {
            return array('success'=>true, 'message'=>'Schedule have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_schedule_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM schedules WHERE id = '$id'");
        return $query->result_array();
    }

    public function get_all_schedule()
    {
        $query = $this->db->query("SELECT * FROM schedules ORDER BY id desc");
        return $query->result_array();
    }

    public function get_uploaded_schedules()
    {
        $query = $this->db->query("SELECT * FROM schedules WHERE manual != '' ORDER BY id desc");
        return $query->result_array();
    }

    public function get_oldest_schedule()
    {
        $query = $this->db->query("SELECT * FROM schedules ORDER BY DATE(match_time) > NOW() ASC LIMIT 1");
        return $query->result_array();
    }

    public function add_announcement($announcemet)
    {
        $field = array();
        $value_field = array();
        
        foreach($announcemet as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO announces (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Announcement have added successfully');
    }

    public function update_announcement($announcement)
    {
        $value_field = array();
        foreach($announcement as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE announces SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $announcement['id'] . "'");
        return array('success'=>true,'message'=>'Announcement have updated successfully');
    }

    public function delete_announcement($id)
    {
        $query = $this->db->query("DELETE FROM announces WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Announcement have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_announcement()
    {
        $query = $this->db->query("SELECT * FROM announces");
        return $query->result_array();
    }

    public function get_latest_announcement()
    {
        $query = $this->db->query("SELECT * FROM announces ORDER BY id DESC");
        return $query->result_array();
    }

    public function add_slider($slider)
    {
        $field = array();
        $value_field = array();
        
        foreach($slider as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO sliders (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Slider have added successfully');
    }

    public function update_slider($slider)
    {
        $value_field = array();
        foreach($slider as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE sliders SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $slider['id'] . "'");
        return array('success'=>true,'message'=>'Slider have updated successfully');
    }

    public function delete_slider($id)
    {
        $query = $this->db->query("DELETE FROM sliders WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Slider have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_slider_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM sliders WHERE id = '$id'");
        return $query->result_array();
    }

    public function get_all_slider()
    {
        $query = $this->db->query("SELECT * FROM sliders");
        return $query->result_array();
    }

    public function get_active_slider()
    {
        $query = $this->db->query("SELECT * FROM sliders WHERE slider_status = 1");
        return $query->result_array();
    }

    public function add_team($team)
    {
        $field = array();
        $value_field = array();
        
        foreach($team as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO teams (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Team have added successfully');
    }

    public function update_team($team)
    {
        $value_field = array();
        foreach($team as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE teams SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $team['id'] . "'");
        return array('success'=>true,'message'=>'Team have updated successfully');
    }

    public function delete_team($id)
    {
        $query = $this->db->query("DELETE FROM teams WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Team have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_team()
    {
        $query = $this->db->query("SELECT * FROM teams order by id desc");
        return $query->result_array();
    }

    public function get_all_teampoints()
    {
        $query = $this->db->query("SELECT * FROM teams ORDER BY team_point DESC");
        return $query->result_array();
    }

    public function add_result($result)
    {
        $field = array();
        $value_field = array();
        
        foreach($result as $key => $value)
        {
            if(is_array($value))
            {
                $value_fields = "'" . serialize($value) . "'";
            } else {
                $value_fields = "'" . $value . "'";
            }

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO results (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Latest Result have added successfully');
    }

    public function update_result($result)
    {
        $value_field = array();
        foreach($result as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE results SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $result['id'] . "'");
        return array('success'=>true,'message'=>'Latest Result have updated successfully');
    }

    public function delete_result($id)
    {
        $query = $this->db->query("DELETE FROM results WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Result have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_result()
    {
        $query = $this->db->query("SELECT * FROM results");
        return $query->result_array();
    }

    public function get_latest_result()
    {
        $query = $this->db->query("SELECT * FROM results ORDER BY id DESC LIMIT 1");
        return $query->result_array();
    }

    public function add_news($news)
    {
        $data = [
            "news_title" => $this->input->post('news_title'),
            "slug" => url_title($this->input->post('news_title'), 'dash', true),
            "news_content" => $this->input->post('news_content'),
        ];
        $this->db->insert('news',$data);

        return array('success'=>true,'message'=>'News have added successfully');
    }

    public function update_news($news)
    {
        $id = $this->input->post('id');
        $data = [
            "news_title" => $this->input->post('news_title'),
            "slug" => url_title($this->input->post('news_title'), 'dash', true),
            "news_content" => $this->input->post('news_content'),
        ];
        $this->db->where(['id'=>$id])->update('news',$data);
        return array('success'=>true,'message'=>'News have updated successfully');
    }

    public function delete_news($id)
    {
        $query = $this->db->query("DELETE FROM news WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'News have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_news()
    {
        $query = $this->db->query("SELECT * FROM news");
        return $query->result_array();
    }

    public function get_latest_news()
    {
        $config = config();
        $total_news_items = (int)$config['total_news_items'] ? (int)$config['total_news_items'] : 5;
        $query = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT ".$total_news_items);
        return $query->result_array();
    }

    public function add_tncs($tncs)
    {
        $field = array();
        $value_field = array();
        
        foreach($tncs as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO tncs (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'TNC have added successfully');
    }

    public function update_tncs($tncs)
    {
        $value_field = array();
        foreach($tncs as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE tncs SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $tncs['id'] . "'");
        return array('success'=>true,'message'=>'TNC have updated successfully');
    }

    public function delete_tncs($id)
    {
        $query = $this->db->query("DELETE FROM tncs WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'TNC have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_tncs()
    {
        $query = $this->db->query("SELECT * FROM tncs");
        return $query->result_array();
    }

    public function get_latest_tncs()
    {
        $query = $this->db->query("SELECT * FROM tncs ORDER BY id DESC");
        return $query->result_array();
    }

    public function send_mail($mail)
    {
        $field = array();
        $value_field = array();
        
        foreach($mail as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO messages (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Mail have sended successfully');
    }

    // public function update_mail($mail)
    // {
    //     $value_field = array();
    //     foreach($mail as $key => $value)
    //     {
    //         if( $key == 'id')
    //             continue;
    //         $value_fields = $key . '="' . $value .'"';

    //         array_push($value_field, $value_fields);
    //     }
    //     $this->db->query("UPDATE messages SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $mail['id'] . "'");
    //     return array('success'=>true,'message'=>'Mail have updated successfully');
    // }

    public function delete_mail($mail)
    {
        $value_field = array();
        foreach($mail as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE messages SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $mail['id'] . "'");

        $query = $this->db->query("SELECT * FROM messages WHERE id = " . $mail['id']);
        $result = $query->result_array();

        if ($result[0]['from_del_status'] == 1 && $result[0]['to_del_status'] == 1) {
            $del_query = $this->db->query("DELETE FROM messages WHERE id = " . $mail['id']);
            if ($del_query) {
                return array('success'=>true, 'message'=>'Result have deleted successfully');
            } else {
                return array('success'=>false,'message'=>'Database error');
            }
        } else {
            return array('success'=>true, 'message'=>'Result have deleted successfully');
        } 
    }

    public function get_from_mail($from_user)
    {
        $query = $this->db->query("SELECT * FROM messages WHERE from_user = '$from_user' AND from_del_status = 0");
        return $query->result_array();
    }

    public function get_to_mail($to_user)
    {
        $query = $this->db->query("SELECT * FROM messages WHERE to_user = '$to_user' AND to_del_status = 0");
        return $query->result_array();
    }

    public function get_new_mail($to_user)
    {
        $query = $this->db->query("SELECT * FROM messages WHERE to_user = '$to_user' AND read_status = 0");
        return $query->result_array();
    }

    public function get_mail_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM messages WHERE id = '$id'");
        return $query->result_array();
    }

    public function insertTransaction($data)
    {

        $field = array();
        $value_field = array();
        
        foreach($data as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $insert = $this->db->query("INSERT INTO payments (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");
        if ($insert)
        {
            $this->db->query("UPDATE pendings SET status = 1 WHERE user_id = " . $data['user_id'] . " AND fee_id = " . $data['product_id']);
        }

        return $insert?true:false;
    }

    public function insertTransactionProduct($data)
    {

        $field = array();
        $value_field = array();
        
        foreach($data as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $insert = $this->db->query("INSERT INTO product_payments (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return $insert?true:false;
    }

    public function add_tournament($tournament)
    {
        $field = array();
        $value_field = array();
        
        foreach($tournament as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO tournaments (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Tournament have added successfully');
    }

    public function update_tournament($tournament)
    {
        $value_field = array();
        foreach($tournament as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE tournaments SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $tournament['id'] . "'");
        return array('success'=>true,'message'=>'Tournament have updated successfully');
    }

    public function delete_tournament($id)
    {
        $query = $this->db->query("DELETE FROM tournaments WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Tournament have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    // public function get_tournament_by_id($id)
    // {
    //     $query = $this->db->query("SELECT * FROM tournaments WHERE id = '$id'");
    //     return $query->result_array();
    // }

    public function get_all_tournament()
    {
        $query = $this->db->query("SELECT * FROM tournaments");
        return $query->result_array();
    }

    public function add_training($training)
    {
        $field = array();
        $value_field = array();
        
        foreach($training as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO trainings (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Training have added successfully');
    }

    public function update_training($training)
    {
        $value_field = array();
        foreach($training as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE trainings SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $training['id'] . "'");
        return array('success'=>true,'message'=>'Training have updated successfully');
    }

    public function delete_training($id)
    {
        $query = $this->db->query("DELETE FROM trainings WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Training have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    // public function get_training_by_id($id)
    // {
    //     $query = $this->db->query("SELECT * FROM trainings WHERE id = '$id'");
    //     return $query->result_array();
    // }

    public function get_all_training()
    {
        $query = $this->db->query("SELECT * FROM trainings");
        return $query->result_array();
    }

    public function add_product($product)
    {
        $field = array();
        $value_field = array();
        
        foreach($product as $key => $value)
        {
            $value_fields = '"' . $value . '"';

            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO products (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Product have added successfully');
    }

    public function update_product($product)
    {
        $value_field = array();
        foreach($product as $key => $value)
        {
            if( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field, $value_fields);
        }
        $this->db->query("UPDATE products SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $product['id'] . "'");
        return array('success'=>true,'message'=>'Product have updated successfully');
    }

    public function delete_product($id)
    {
        $query = $this->db->query("DELETE FROM products WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Product have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_product_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM products WHERE id = '$id'");
        return $query->result_array();
    }

    public function get_active_all_product()
    {
        $query = $this->db->query("SELECT * FROM products WHERE product_status = 1 ORDER BY id ASC LIMIT 4");
        return $query->result_array();
        
    }

    public function get_active_all_products($id)
    {
        if($id){
            $category = $this->db->query('SELECT id FROM categories WHERE category_name = "'. $id . '"')->result_array();
            $products_date = $this->db->query('SELECT * FROM products WHERE category_id = ' . $category[0]['id'] . ' AND product_status = 1');
            return $products_date->result_array();
        }
        else{
            $query = $this->db->query('SELECT * from products WHERE product_status = 1');
            return $query->result_array();
        }
        
    }

    public function get_active_all_products_attr($id)
    {
        if($id){
            $attr = $this->db->query('select id from sizes where size_name = "'. $id . '"')->result_array();
            $size = $this->db->query('select * from products where size_id = '. $attr[0]['id'] . ' ');
            return $size->result_array();
        }
        else{
            $query = $this->db->query('select * from products');
            return $query->result_array();
        }
        
    }

    public function get_active_all_products_colour($id)
    {
        if($id){
            $color = $this->db->query('select id from colors where color_name = "'. $id . '"')->result_array();
            $colors = $this->db->query('select * from products where color_id = '. $color[0]['id'] . ' ');
            return $colors->result_array();
        }
        else{
            $query = $this->db->query('select * from products');
            return $query->result_array();
        }
    }

    public function get_all_products()
    {
        $query = $this->db->query("SELECT * FROM products");
        return $query->result_array();
    }

    public function get_all_product_payments()
    {
        $query = $this->db->query("SELECT * FROM product_payments");
        return $query->result_array();
    }

    public function get_all_categories()
    {
        $query = $this->db->query("SELECT * FROM categories");
        return $query->result_array();
    }

    public function add_category($category)
    {
        $field = array();
        $value_field = array();
        
        foreach($category as $key => $value)
        {
            $value_fields = '"' . $value . '"';
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO categories (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Category have added successfully');
    }

    public function update_category($category)
    {
        $value_field = array();
        foreach($category as $key => $value)
        {
            if ( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field , $value_fields);
        }
        $this->db->query("UPDATE categories SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $category['id'] . "'");
        return array('success'=>true,'message'=>'Category have updated successfully');
    }

    public function delete_category($id)
    {
        $query = $this->db->query("DELETE FROM categories WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Category have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_colors()
    {
        $query = $this->db->query("SELECT * FROM colors");
        return $query->result_array();
    }

    public function add_color($color)
    {
        $field = array();
        $value_field = array();
        
        foreach($color as $key => $value)
        {
            $value_fields = '"' . $value . '"';
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO colors (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Color have added successfully');
    }

    public function update_color($color)
    {
        $value_field = array();
        foreach($color as $key => $value)
        {
            if ( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field , $value_fields);
        }
        $this->db->query("UPDATE colors SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $color['id'] . "'");
        return array('success'=>true,'message'=>'Color have updated successfully');
    }

    public function delete_color($id)
    {
        $query = $this->db->query("DELETE FROM colors WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Color have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_sizes()
    {
        $query = $this->db->query("SELECT * FROM sizes");
        return $query->result_array();
    }

    public function add_size($size)
    {
        $field = array();
        $value_field = array();
        
        foreach($size as $key => $value)
        {
            $value_fields = '"' . $value . '"';
            array_push($field,$key);
            array_push($value_field , $value_fields);
        }

        array_push($field,'create_date');
        array_push($value_field,'NOW()');
        array_push($field,'update_date');
        array_push($value_field,'NOW()');

        $this->db->query("INSERT INTO sizes (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");

        return array('success'=>true,'message'=>'Size have added successfully');
    }

    public function update_size($size)
    {
        $value_field = array();
        foreach($size as $key => $value)
        {
            if ( $key == 'id')
                continue;
            $value_fields = $key . '="' . $value .'"';

            array_push($value_field , $value_fields);
        }
        $this->db->query("UPDATE sizes SET " . join(',', $value_field) . ", update_date = NOW() WHERE id = '" . $size['id'] . "'");
        return array('success'=>true,'message'=>'Size have updated successfully');
    }

    public function delete_size($id)
    {
        $query = $this->db->query("DELETE FROM sizes WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Size have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_all_delivery()
    {
        $query = $this->db->query("SELECT * FROM delivery");
        return $query->result_array();
    }

    public function get_all_active_delivery()
    {
        $query = $this->db->query("SELECT * FROM delivery WHERE status = 1");
        return $query->result_array();
    }

    public function add_delivery($delivery)
    {
        $field = array();
        $value_field = array();
        
        foreach($delivery as $key => $value)
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


        $this->db->query("INSERT INTO delivery (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");


        return array('success'=>true,'message'=>'Delivery have added successfully');
    }

    public function update_delivery($delivery)
    {
        $value_field = array();
        foreach($delivery as $key => $value)
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
        $this->db->query("UPDATE delivery SET " . join(',', $value_field) . ", `update_date` = NOW() WHERE id = '" . $delivery['id'] . "'");
        return array('success'=>true,'message'=>'Delivery have updated successfully');
    }

    public function delete_delivery($id)
    {
        $query = $this->db->query("DELETE FROM delivery WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Delivery have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    // Fee management

    public function get_all_fees()
    {
        $query = $this->db->query("SELECT * FROM fees");
        return $query->result_array();
    }

    public function add_fee($fee)
    {
        $field = array();
        $value_field = array();
        
        foreach($fee as $key => $value)
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


        $this->db->query("INSERT INTO fees (" . join(',', $field) . ") VALUES (" . join(',', $value_field) . ")");


        return array('success'=>true,'message'=>'fee have added successfully');
    }

    public function update_fee($fee)
    {
        $value_field = array();
        foreach($fee as $key => $value)
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
        $this->db->query("UPDATE fees SET " . join(',', $value_field) . ", `update_date` = NOW() WHERE id = '" . $fee['id'] . "'");
        return array('success'=>true,'message'=>'fee have updated successfully');
    }

    public function delete_fee($id)
    {
        $query = $this->db->query("DELETE FROM fees WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'fee have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function delete_all_fee($data)
    {
        $query = $this->db->query("DELETE FROM fees WHERE id in (" . join(',',$data) . ")");
        if ($query) {
            return array('success'=>true, 'message'=>'All Fee have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function put_fee_player($data, $id)
    {
        if(count($data) > 0)
        {
            // var_dump($data);exit();
            foreach($data as $key=>$value) {
                $this->db->query("INSERT INTO pendings (user_id, fee_id) VALUES (" . $data[$key] . "," . $id . ")");
            }
        }

        return array('success'=>true,'message'=>'Fee have puted successfully');
    }

    public function get_pending_status($status)
    {
        $query = $this->db->query("SELECT * FROM pendings WHERE status =" . $status);
        return $query->result_array();
    }

    public function get_status_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM pendings WHERE user_id =" . $id);
        return $query->result_array();
    }

    public function get_unpaid_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM pendings WHERE user_id =" . $id . " AND status = 0");
        return $query->result_array();
    }

    public function delete_acheive($id)
    {
        $query = $this->db->query("DELETE FROM pendings WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Pending status have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function delete_all_acheive($data)
    {
        $query = $this->db->query("DELETE FROM pendings WHERE id in (" . join(',',$data) . ")");
        if ($query) {
            return array('success'=>true, 'message'=>'All Acheive have deleted successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function update_pay_stauts($id)
    {
        $query = $this->db->query("UPDATE pendings SET status = 1 WHERE id = " . $id);
        if ($query) {
            return array('success'=>true, 'message'=>'Pending status have updated successfully');
        } else {
            return array('success'=>false,'message'=>'Database error');
        }
    }

    public function get_active_all_sponsors()
    {
        return $this->db->where(['status' => 'active'])->order_by('id','desc')->get('sponsors')->result_array();        
    }

    public function get_latest_videos()
    {
        $config = config();
        $total_videos_items = (int)$config['total_videos_items'] ? (int)$config['total_videos_items'] : 5;

        return $this->db->where(['status' => 'active'])->order_by('id','desc')->limit($total_videos_items)->get('latest_videos')->result_array();        
    }

    public function get_tournament_dropdown()
	{
		$rows =  $this->db->get("tournaments")->result_array();

		if($rows)
		{
			$list[] = "-- Select Touranment --";
			foreach($rows as $key => $val)
			{
				$list[$val['id']] = $val['tournament_name'];
			}

			return $list;
		}

		return [];
	}

    public function get_team_dropdown()
	{
		$rows =  $this->db->get("teams")->result_array();

		if($rows)
		{
			$list[] = "-- Select Team --";
			foreach($rows as $key => $val)
			{
				$list[$val['id']] = $val['team_name'];
			}

			return $list;
		}

		return [];
	}

    public function get_player_dropdown()
	{
		$rows =  $this->db->where(['user_group' => 4])->get("users")->result_array();

		if($rows)
		{
			$list[] = "-- Select Player --";
			foreach($rows as $key => $val)
			{
				$list[$val['id']] = $val['fullname'];
			}

			return $list;
		}

		return [];
	}

    public function get_countries_dropdown()
	{
		$rows =  $this->db->get("country")->result_array();

		if($rows)
		{
			$list[] = "-- Select Team --";
			foreach($rows as $key => $val)
			{
				$list[$val['id']] = $val['name'];
			}

			return $list;
		}

		return [];
	}

    public function get_tournament_standings($id = null)
    {
        
        if($id)
        {
            $q = "SELECT t.*,SUM(s.total_points) AS total_points FROM teams AS t LEFT JOIN tournament_standings AS s ON s.team_id = t.id WHERE s.tournament_id =".$id;
        }else{
            $q = "SELECT t.*,SUM(s.total_points) AS total_points FROM teams AS t LEFT JOIN tournament_standings AS s ON s.team_id = t.id GROUP BY s.team_id ORDER BY s.total_points DESC ";
        }
        return $this->db->query($q)->result_array();
    }
}
