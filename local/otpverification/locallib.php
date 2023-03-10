<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Signup event handlers
 *
 * @package    
 * @copyright  2011 Qontori Pte Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
//require_once(dirname(__FILE__) . '/../../config.php');
/**
 * Utility functions for handling otp
 */
Class otpverification {

  public static function send_otp($mobile) {
    global $DB, $CFG, $USER;
    
    $otp = rand(100000,999999);
    $sandbox = get_config( 'local_otpverification', 'enable_sandbox');
    
    
    $otprecord = $DB->get_record('otpverification', array('mobile'=>$mobile));
    if($otprecord) {
        return array('sandbox'=>$sandbox, 'otp'=>$otprecord->otp);
    }

    if(!$sandbox) {
      $success = self::smsapicall($mobile, $otp);
    }

    $otpinsert = new stdClass();
    $otpinsert->mobile = $mobile;
    $otpinsert->otp = $otp;
    $otpinsert->expired = 0;
    $otpinsert->timemodified = time();
    $insertid = $DB->insert_record('otpverification', $otpinsert);
    if($insertid) {
      return array('sandbox'=>$sandbox, 'otp'=>$otp);
    }
  }

  public static function smsapicall($mobile, $otp) {
    $mobile='91'.$mobile;
    $otp=urlencode("Your otp to verify phone $otp");
    $userid='otp@mashmari.in';
    $password='Apple!23';

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://sms.tivre.com/httppush/send_smsSch.asp?Userid=$userid&password=$password&Msg=$otp&mobnum=$mobile&senderid=mashmari&msgId=123456&qrytype=impalert&TivreId=1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "X-Custom-Header: value",
        "Content-Type: text/html",
        "Accept: text/html"
      ),
));

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, array());

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
      echo "Something went wrong. Please try again";
    } else {
      return $response;
    }
   curl_close($curl);
  }
}                                                                                                                        
