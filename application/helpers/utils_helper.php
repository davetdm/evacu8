<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of Utils
 *
 * @author Johannes Ramothale <jramothale@iecon.co.za>
 * @since 05 Oct 2016, 7:05:58 AM
 */
final class utils {

    public static function response($message = "", $status = "ok") {
        return json_encode(["status" => $status, "message" => $message]);
    }

    public static function requireMessage(){
        return '<p><em>All fields marcked with <span class="text-danger">*</span> are required.</em></p>';
    }

    public static function requireStar(){
        return '<span class="text-danger">*</span>';
    }

    public static function getUserAgent($hashed = null) {
        return $_SERVER["HTTP_USER_AGENT"];
    }

    public static function hashed(){
        return hash("sha256", self::getUserAgent() . rand(0, 999999));
    }

    public static function randomNumber($min, $max) {
        return intval(mt_rand($min, $max));
    }

    public static function randomString($length = 10) {
        $keyspace = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@$*()";
        $str = "";
        $max = strlen($keyspace) - 1;
        for ($i = 0; $i < $length; $i++) {
            $str .= $keyspace[intval(mt_rand(0.0, $max))];
        }
        return $str;
    }

    public static function getIpAddress() {
        $ip = getenv('HTTP_CLIENT_IP') ?:
                getenv('HTTP_X_FORWARDED_FOR') ?:
                getenv('HTTP_X_FORWARDED') ?:
                getenv('HTTP_FORWARDED_FOR') ?:
                getenv('HTTP_FORWARDED') ?:
                getenv('REMOTE_ADDR');
        return $ip;
    }

    public static function getUserAccessInfo() {
        $user_ip = self::getIpAddress();
        $ch = curl_init("https://freegeoip.net/json/$user_ip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $json = json_decode($result, true);
        return $json;
    }

    public static function getUserLocation() {
        $json = self::getUserAccessInfo();
        return "{$json["country_name"]},{$json["region_name"]},{$json["city"]},{$json["zip_code"]}";
    }

    public static function getTime($datetime = null) {
        if ($datetime) {
            $date = new DateTime($datetime);
            return $date->format("H:i:s");
        } else {
            $now = new DateTime();
            return $now->format("H:i:s");
        }
    }

    public static function getMonthOnDate($datetime = null){
        if ($datetime) {
            $date = new DateTime($datetime);
            return $date->format("M");
        } else {
            $now = new DateTime();
            return $now->format("M");
        }
    }

    public static function getDate($datetime = null) {
        if ($datetime) {
            $date = new DateTime($datetime);
            return $date->format("Y-m-d");
        } else {
            $now = new DateTime();
            return $now->format("Y-m-d");
        }
    }

    public static function getDateTime($datetime = null) {
        if ($datetime) {
            $date = new DateTime($datetime);
            return $date->format("Y-m-d H:i:s");
        } else {
            $now = new DateTime();
            return $now->format("Y-m-d H:i:s");
        }
    }

    public static function getCurrentMonth(){
        $now = new DateTime();
        return $now->format("M");
    }

    public static function getLastYear(){
        return date("Y", strtotime("-1 year"));
    }

    public static function getLastMonth($date, $increment){
        if (!$date) {
            $date = new DateTime(self::getDate());
        } else {
            $date = new DateTime($date);
        }
        $date->modify($increment);
        return $date->format("M");
    }

    public static function createDateFromMonth($month){
        $dt = DateTime::createFromFormat('!M', $month);
        return $dt->format('M');
    }

    public static function formateDateTime($datetime) {
        if(!$datetime){
            return null;
        }
        $date = new DateTime($datetime);
        return $date->format("d M, Y") . " at " . $date->format("H:i:s");
    }

    public static function formateDate($datetime) {
        if(!$datetime){
            return null;
        }
        $date = new DateTime($datetime);
        return $date->format("d M, Y");
    }

    public static function formatUnixDate($unix_date){
        if(!$unix_date){
            return null;
        }
        if(self::isValidDate($unix_date)) {
            return date("Y-m-d", $unix_date);
        }
        else {
            return $unix_date;
        }
    }

    public static function formatUnixDatetime($unix_date_time){
        if(!$unix_date_time){
            return null;
        }
        if(self::isValidDate($unix_date_time)) {
            return date("Y-m-d H:i:s", $unix_date_time);
        }
        else {
            return $unix_date_time;
        }
    }

    public static function isValidDate($unix_string){
        return ( 1 === preg_match( '~^[1-9][0-9]*$~', $unix_string ) );
    }

    public static function incrementDate($increment, $date = null) {
        if (!$date) {
            $date = new DateTime(self::getDate());
        } else {
            $date = new DateTime($date);
        }
        $date->modify($increment);
        return $date->format("Y-m-d");
    }

    public static function incrementDateTime($increment, $date = null) {
        if (!$date) {
            $date = new DateTime(self::getDateTime());
        } else {
            $date = new DateTime($date);
        }
        $date->modify($increment);
        return $date->format("Y-m-d H:i:s");
    }

    public static function makeDirectory($path, $mode = 0777) {
        return mkdir($path, $mode, true);
    }

    public static function changeDirectoryPermissions($path, $mode = 0777) {
        return @chmod($path, $mode);
    }

}
