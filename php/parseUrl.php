<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/29/15
 * Time: 12:24 AM
 */
function parseUrl($url)
{
    if ($url[0] != '/') {
        $url = "/" . $url;
    }
    return 'http://'.$_SERVER['SERVER_NAME']."/quiz".$url;
}