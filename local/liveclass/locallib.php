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
 * @package    enrol_signup
 * @copyright  2011 Qontori Pte Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->libdir . '/formslib.php');
require_once($CFG->libdir . '/moodlelib.php');
require_once($CFG->libdir . '/enrollib.php');

/**
 * Event handler for signup enrol plugin.
 */
class local_signup_handler {

  public static function user_created(\core\event\user_created $event) {
    global $CFG, $DB;

    $sql = "update {user} set confirmed = 1 where id = $event->objectid";
    $DB->execute($sql);
    $user = $event->get_record_snapshot('user', $event->objectid);
    enrol_try_internal_enrol($user->selected_courseid, $user->id, $user->selected_roleid);
    complete_user_login($user);
    redirect($CFG->wwwroot.'/my/courses.php');
  }

}
