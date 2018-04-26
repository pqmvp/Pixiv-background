<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 12:47
 */
class Func
{
    public static function curlGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array());
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_REFERER, 'https://pixiv.net');
        $data = curl_exec($ch);
        curl_close($ch);
        var_dump($data);
        return $data;
    }

    public static function getImage(&$image,&$url)
    {
        $html = self::curlGet("https://pixiv.net");
        $html=preg_replace('|\\\|', '', $html);
        $html=preg_replace('|u0026|', '&', $html);
        preg_match_all('|https://i\.pximg\.net/img-master/img/\d{4}/\d{2}/\d{2}/\d{2}/\d{2}/\d{2}/(.*?\.\w{3})|', $html, $image);
        preg_match_all('|https://www\.pixiv\.net/member_illust.php\?mode=medium&illust_id=\d+|', $html, $url);
        var_dump($html);
        var_dump($image);
        var_dump($url);
    }

    public static function download(&$image)
    {
        $image_path = 'E:/Pixiv-background/';
        foreach ($image[0] as $k=>$v) {
            $file = $image_path . $image[1][$k];
            $data = self::curlGet($v);
            file_put_contents($file, $data);
        }
    }
}

Func::getImage($image, $url);
Func::download($image);
