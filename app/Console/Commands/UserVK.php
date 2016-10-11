<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserVK extends Command
{
   
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function Parse ($p1,$p2,$p3)
    {
        $num1 = strpos($p1,$p2);
        if( $num1 === false)
        {
            return 0;
        }
        $num2 = substr($p1, $num1);
        return strip_tags(substr($num2, 0, strpos($num2,$p3)));
    }


    public function getUserPage($id = null, $cookies = null,$headers) 
    {
        
        
        $get = $this->post('https://vk.com/'.$id, array(
        'headers' => array(
        'accept: '.$headers['accept'],
        'content-type: '.$headers['content-type'],
        'user-agent: '.$headers['user-agent']
        ),
        'cookies' => $cookies
        ));
        return $get;
    }

    public function post($url = null, $params = null) 
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
         
        if(isset($params['headers'])) 
        {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
        }
         
        if(isset($params['cookies'])) 
        {
            curl_setopt($ch, CURLOPT_COOKIE, $params['cookies']);
        }
         
        $result = curl_exec($ch);
         
        list($headers, $result) = explode("\r\n\r\n", $result, 4);
         
        preg_match_all('|Set-Cookie: (.*);|U', $headers, $parseCookies);
         
        $cookies = implode(';', $parseCookies[1]);
         
        curl_close($ch);
        return array('headers' => $headers, 'cookies' => $cookies, 'content' => $result);   
    } 

    public function CheckUser($id, $cookies, $headers)
    {
            if (intval($id)==0)
            {
                $pageId = $id;
            }
            else
            $pageId = 'id'.$id;
            
            $getMyPage = $this->getUserPage($pageId, $cookies, $headers);

            

            $responseOnline = $this->Parse($getMyPage['content'],'<div id="profile_online_lv">','</b>');
            if (empty($responseOnline)) 
            {
                $responseOnline = 'offline';
                $responseVersion = '';
                $responseTitle = $this->Parse($getMyPage['content'],'<title>','</title>');    
            }
            else 
            {
                $responseOnline = $this->Parse($getMyPage['content'],'<div id="profile_online_lv">','</b>');
            
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->LoadHTML($getMyPage['content']);

                $data = $dom->getElementById("profile_mobile_online");

                $responseVersion = $data->getAttribute('class');
            

                if ($responseVersion == "mob_onl profile_mob_onl unshown") {

                    $responseVersion = 'desktop';
                }

                if ($responseVersion == "mob_onl profile_mob_onl") {

                    $responseVersion = 'mobile';
                }
                $responseTitle = $this->Parse($getMyPage['content'],'<title>','</title>');
            }

            $response['title'] = iconv('windows-1251', 'utf-8', $responseTitle);
            $response['status'] = iconv('windows-1251', 'utf-8', $responseOnline);
            $response['version'] = iconv('windows-1251', 'utf-8', $responseVersion);
            return $response;
    }

    public function handle()
    {
        header("Content-Type: text/html; charset=utf-8");

        $login = 'idefiks1@rambler.ru';
        $password = 'nrkrM9DvX7737483I';

        $headers = array(
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'content-type' => 'application/x-www-form-urlencoded',
        'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36'
        );

        $getMainPage = $this->post('https://vk.com', array(
        'headers' => array(
        'accept: '.$headers['accept'],
        'content-type: '.$headers['content-type'],
        'user-agent: '.$headers['user-agent']
        )
        ));

        preg_match('/name=\"ip_h\" value=\"(.*?)\"/s', $getMainPage['content'], $ipH);

        preg_match('/name=\"lg_h\" value=\"(.*?)\"/s', $getMainPage['content'], $lgH);

        $postAuth = $this->post('https://login.vk.com/?act=login', array(
        'params' => 'act=login&role=al_frame&_origin='.urlencode('http://vk.com').'&ip_h='.$ipH[1].'&lg_h='.$lgH[1].'&email='.urlencode($login).'&pass='.urlencode($password),
        'headers' => array(
        'accept: '.$headers['accept'],
        'content-type: '.$headers['content-type'],
        'user-agent: '.$headers['user-agent']
        ),
        'cookies' => $getMainPage['cookies']
        ));

        preg_match('/Location\: (.*)/s', $postAuth['headers'], $postAuthLocation);

        if(!preg_match('/\_\_q\_hash=/s', $postAuthLocation[1])) 
        {
            echo 'Authirization failed <br /> <br />'.$postAuth['headers'];
            exit;
        }

        $getAuthLocation = $this->post($postAuthLocation[1], array(
        'headers' => array(
        'accept: '.$headers['accept'],
        'content-type: '.$headers['content-type'],
        'user-agent: '.$headers['user-agent']
        ),
        'cookies' => $postAuth['cookies']
        ));

        $cookies = $getAuthLocation['cookies'];

        $pageIdSerg = 'shmigelsky_s';
        $pageIdMisha = '16574432';


        $response[0] = $this->CheckUser($pageIdSerg, $cookies, $headers);
        $response[1]= $this->CheckUser($pageIdMisha, $cookies, $headers);
        
        dd($response);
        die();
        
       
    }
}
