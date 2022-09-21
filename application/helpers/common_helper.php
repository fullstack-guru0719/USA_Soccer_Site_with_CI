<?php

if(!function_exists('config'))
{
    function config()
    {
        $ci	= &get_instance();
        $rows = $ci->db->get("app_settings")->result_array();
        if(count($rows) == 0){
            return [];
        }else{
            $list = [];
            foreach($rows as $key => $val)
            {
                $list[$val['setting_name']] = $val['setting_value'];
            }

            return $list;
        }
    }
}

if(!function_exists("pr"))
{
	function pr($data = NULL)
	{
		echo "<pre>";print_r($data);echo "</pre>";
	}
	
	function prd($data = NULL)
	{
		echo "<pre>";print_r($data);echo "</pre>";die;
	}
}

if(!function_exists('render_page_js'))
{
    function render_page_js($page = null)
    {
        if(empty($page))
        {
            return;
        }
        if(!file_exists(APPPATH .'views/backend/'.$page.'/'.$page.'_js.php'))
        {
            return;
        }
        $ci = & get_instance();
        $ci->load->view('backend/'.$page.'/'.$page.'_js');
    }
}

if(!function_exists("tableObject"))
{
	function tableObject($table = NULL)
	{
		if(empty($table))
		{
			return array();
		}

	$ci = &get_instance();
	$query = $ci->db->query('SHOW COLUMNS FROM '.$ci->db->dbprefix.$table);

	$result = new stdClass;
	foreach($query->result() as $key=>$val)
	{
		$result->{$val->Field} = '';
	}
		return $result;
	}
}