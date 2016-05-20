<?php
namespace App\Helpers;

/**
 * Class to send an SMS
 * Trait SmsTrait
 * @package app
 */
trait SmsTrait
{

    /**
     * Sends an SMS message
     * @param $name string
     * @param $phone string
     * @param $comments
     * @return mixed|string
     */
    public function sms($name, $phone, $comments)
    {
        if ($_ENV['APP_ENV']=='local' || $_ENV['APP_ENV']=='testing') {
            //return;
        }

        $user = $_ENV['SMS_USER'];
        $pass = $_ENV['SMS_PASS'];
        $sms_phone = $_ENV['SMS_PHONE'];
        $sms_url = $_ENV['SMS_URL'];

        date_default_timezone_set('Europe/London');
        $datetime = new \DateTime();
        $h = $datetime->format('H');
        if ($h < 23 && $h > 7) {
            $url = $sms_url;
            $post = array(
                'username' => $user,
                'password' => $pass,
                'mobile' => $sms_phone,
                'sms' => 'YG, ' . $name . ', ' . $phone . ': ' . substr($comments, 0, 120)
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_NOPROGRESS, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            return curl_exec($ch);
        }
        return '';

    }
}