<?php

namespace App\Classes;
class Curl 
{
    public $cookie = '';
    public $header = array(
        'accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'content-type:application/x-www-form-urlencoded',
        'user-agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'
        );
    public function curlConnect ($url = null, $params = null) 
    {   
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        if(isset($params['params'])) 
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params['params']);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);

        $result = curl_exec($ch);
        list($headers, $result) = explode("\r\n\r\n", $result, 4);
        preg_match_all('|Set-Cookie: (.*);|U', $headers, $parse_cookies);
        
        $cookies = implode(';', $parse_cookies[1]);

        $this->cookie = $this->cookie.$cookies.';';
        curl_close($ch);
        
        return array('headers' => $headers, 'content' => $result);   
    }
    
   
   
}
