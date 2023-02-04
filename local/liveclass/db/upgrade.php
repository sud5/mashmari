<?php
defined('MOODLE_INTERNAL') || die();

function xmldb_local_liveclass_upgrade($oldversion) {
    global $DB, $CFG;
    $dbman = $DB->get_manager();

    // Define learningpath_cohorts table scheme.
    if ($oldversion < 2023020400) {
        $table = new xmldb_table('user');
        $field = new xmldb_field('selected_courseid', XMLDB_TYPE_INTEGER, '5', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');
        $field1 = new xmldb_field('selected_roleid', XMLDB_TYPE_INTEGER, '5', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        if (!$dbman->field_exists($table, $field1)) {
            $dbman->add_field($table, $field1);
        }

        upgrade_plugin_savepoint(true, 2023020400, 'local', 'liveclass');
    }

    return true;
}