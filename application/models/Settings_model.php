<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function save($data)
    {
        foreach($data as $key=>$val)
		{
			$isExists	=	$this->db->where("setting_name",$val["setting_name"])->get("app_settings")->row();
			if($isExists)
			{
				$this->db->where("setting_name",$val["setting_name"])->update("app_settings",$val);
			}else{
				$this->db->insert("app_settings",$val);
			}
		}
		return true;
    }

    public function get($setting_name=null)
    {
        if($setting_name){
            return $this->db->where(['setting_name' => $setting_name])->get("app_settings")->row_array();
        }else{
            $results = $this->db->get("app_settings")->result_array();
            if(count($results) > 0)
            {
                $list = [];
                foreach($results as $key => $val)
                {
                    $list[$val['setting_name']] = $val['setting_value'];
                }
                return $list;
            }else{
                return [
                    "section_latest_results" => '1',
                    "section_latest_news" => '1',
                    "section_latest_videos" => '1',
                    "section_merchandise" => '1',
                    "shop_link" => '',
                    "allow_registration" => '1',
                    "player_registration_off_message" => '',
                    "allow_sponser_registration" => '1',
                    "sponser_registration_off_message" => '',
                    "facebook_link" => '',
                    "twitter_link" => '',
                    "youtube_link" => '',
                    "footer_logo" => '',
                    "footer_logo_1" => '',
                    "footer_logo_2" => '',
                    "footer_logo_3" => '',
                    "footer_logo_4" => '',
                ];
            }
        }
    }
}
