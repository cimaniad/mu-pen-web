<?php

    function send_request(array $post = array()){
        $api_url="http://dainamic.dsi.uminho.pt/api/";
        if(!function_exists("curl_init")){
            die('Can´t find Curl');
        }
        
        $ch=  curl_init();
        
        if(!$ch){
            die("Can't initialize Curl request");
        }
        
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if(!empty($post)){
            curl_setopt($ch, CURLOPT_POST, true);
            $post_data=  http_build_query($post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
        
        $data = curl_exec($ch);
        
        curl_close($ch);
        
        return $data;
        
        
    }

