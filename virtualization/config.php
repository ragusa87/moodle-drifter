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
 * Configuration for virtualized setups (developement and test)
 *
 * @package virtualization
 * @author Liip <https://www.liip.ch/>
 * @author Didier Raboud <didier.raboud@liip.ch>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

unset($CFG);
global $CFG;
$CFG = new stdClass();

// Database config, standard.
$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle';
$CFG->dbuser    = 'moodle';
$CFG->dbpass    = 'moodle';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array(
    'dbpersist' => false,
    'dbsocket'  => false,
    'dbport'    => '',
);

$CFG->wwwroot   = 'http://moodle.lo';
$CFG->dataroot  = '/var/lib/moodledata';
$CFG->directorypermissions = 02777;

$CFG->admin = 'admin';

$CFG->tool_generator_users_password = 'useruser';

// Force a debugging mode regardless the settings in the site administration
@error_reporting(E_ALL | E_STRICT);   // NOT FOR PRODUCTION SERVERS!
@ini_set('display_errors', '1');      // NOT FOR PRODUCTION SERVERS!
$CFG->debug = (E_ALL | E_STRICT);     // === DEBUG_DEVELOPER - NOT FOR PRODUCTION SERVERS!
$CFG->debugdisplay = 1;               // NOT FOR PRODUCTION SERVERS!
$CFG->debugusers = '2';
$CFG->themedesignermode = false;
define('MDL_PERF', true);
define('MDL_PERFDB', true);
define('MDL_PERFTOLOG', true);
define('MDL_PERFTOFOOT', true);

$CFG->dirroot = dirname(dirname(__FILE__));
if (file_exists($CFG->dirroot . '/config-local.php')) {
    require_once($CFG->dirroot . '/config-local.php');
}

if (file_exists($CFG->dirroot . '/config-dev.php')) {
    require_once($CFG->dirroot . '/config-dev.php');
}

require_once($CFG->dirroot . '/lib/setup.php'); // Do not edit.

