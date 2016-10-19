<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Classes\Curl;
use \App\http\Controllers\Online;
use \App\http\Controllers\VkId;
class UserVk extends Command
{
   
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:check {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check vk status';

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
    public function checkUser($getMyPage)
    {
        $responseOnline = $this->parse($getMyPage['content'],'<div id="profile_online_lv">','</b>');
        if (empty($responseOnline)) 
        {
            $responseOnline = 'offline';
            $responseVersion = '';
            $responseTitle = $this->parse($getMyPage['content'],'<title>','</title>');    
        }
        else 
        {
            $responseOnline = $this->parse($getMyPage['content'],'<div id="profile_online_lv">','</b>');
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->LoadHTML($getMyPage['content']);
            $data = $dom->getElementById("profile_mobile_online");
            $responseVersion = $data->getAttribute('class');
            if ($responseVersion == "mob_onl profile_mob_onl unshown") 
            {
                $responseVersion = 'desktop';
            }
            if ($responseVersion == "mob_onl profile_mob_onl") 
            {
                $responseVersion = 'mobile';
            }
            $responseTitle = $this->parse($getMyPage['content'],'<title>','</title>');
        }

        $response['title'] = iconv('windows-1251', 'utf-8', $responseTitle);
        $response['status'] = iconv('windows-1251', 'utf-8', $responseOnline);
        $response['version'] = iconv('windows-1251', 'utf-8', $responseVersion);
        return $response;
    }

    public function parse ($p1,$p2,$p3)
    {
        $num1 = strpos($p1,$p2);
        if( $num1 === false)
        {
            return 0;
        }
        $num2 = substr($p1, $num1);
        return strip_tags(substr($num2, 0, strpos($num2,$p3)));
    }

    public function getHash($content, $name)
    {
        preg_match('/name=\"'.$name.'\" value=\"(.*?)\"/s', $content, $hash);
        return $hash;
    }

    public function checkHash($postAuth)
    {
        preg_match('/Location\: (.*)/s', $postAuth, $postAuthLocation);
            
        if(!preg_match('/\_\_q\_hash=/s', $postAuthLocation[1])) 
        {
            echo 'Authirization failed <br /> <br />'.$postAuth;
            exit;
        }
        return $postAuthLocation;
    }

    public function handle()
    {
       
        $curl = new Curl();
        $login = $this->argument('login');
        $password = $this->argument('password');

        $getMainPage = $curl->curlConnect('https://vk.com');
        

        $ipH = $this->getHash($getMainPage['content'],'ip_h');
        $lgH = $this->getHash($getMainPage['content'],'lg_h');

        $postAuth = $curl->curlConnect(
        'https://login.vk.com/?act=login', array(
        'params' => 'act=login&role=al_frame&_origin='.urlencode('http://vk.com').'&ip_h='.$ipH[1].'&lg_h='.$lgH[1].'&email='.urlencode($login).'&pass='.urlencode($password)
        ));
               
        $postAuthLocation = $this->checkHash($postAuth['headers']);
        $getAuthLocation = $curl->curlConnect($postAuthLocation[1]);


        $idGet = new VkId();
        $idArray = $idGet->getId();
        
        
        foreach ($idArray as $value) 
        {
            $userId = $idGet->getIdUser($value);
            
            if (!intval($value))
            {
                $pageId = $value;
            }
            else
            $pageId = 'id'.$value;

            
          
         
            $save = new Online();
            $getPage = $curl->curlConnect('https://vk.com/'.$pageId);
            $response = $this->checkUser($getPage);
            $save->write($response['title'], $response['status'], $response['version'], $userId[0]);

            \Log::Info('Write status '.\Carbon\carbon::now());
        }
    }
}
