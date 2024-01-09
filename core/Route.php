<?php
class Route{
    public function handleRoute($url){
        global $routes;
        unset($routes['default']);
        $url = trim($url, '/');
        if(empty($url)){
            $url = '/';
        }
        $handleUrl = $url;
        if(!empty($routes)){
            foreach($routes as $key=>$val){
                if(preg_match('~'.$key.'~is', $url)){
                   $handleUrl = preg_replace('~'.$key.'~is', $val, $url);
                }
            }
        }
        // echo $handleUrl;
        return $handleUrl;
    }
}