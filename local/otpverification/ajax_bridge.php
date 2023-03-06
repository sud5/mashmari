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
 * This plugin serves as a database and plan for all learning activities in the organization,
 * where such activities are organized for a more structured learning program.
 * @package    block_learning_plan
 * @copyright  3i Logic<lms@3ilogic.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @author     Azmat Ullah <azmat@3ilogic.com>
 */
require_once '../../config.php';
require_once(dirname(__FILE__).'/locallib.php');
global $DB, $USER;
$attributes = array();

$otp  = optional_param('otp', null, PARAM_RAW);
$mobile = optional_param('mobile', null, PARAM_RAW);
$action = optional_param('action', '', PARAM_TEXT);

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/otpverification/ajax_bridge.php');


if($action=='verifyotp') {
	$otpvalue = $DB->get_field_sql("select otp from {otpverification} where mobile = :mobile", array('mobile'=>$mobile));
	if(!empty($otp)) {
		if($otpvalue == $otp) {
			// We should update the record in db as verified
			$DB->set_field('otpverification', 'verified', 1, array('mobile'=>$mobile));
			echo 1;
			//
		} 
	}
}

if($action=='sendotp') {
    
	$otp = otpverification::send_otp($mobile);
	if($otp['sandbox'] == 1) {
		echo $otp['otp'];
	}
	die();
}