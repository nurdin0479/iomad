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
 * Reports block external apis
 *
 * @package     local_edwiserreports
 * @copyright   2019 wisdmlabs <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_edwiserreports\external;

defined('MOODLE_INTERNAL') || die();

use external_function_parameters;
use external_value;
use stdClass;

require_once($CFG->libdir.'/externallib.php');
/**
 * Trait implementing the external function local_edwiserreports_set_plugin_config.
 */
trait set_plugin_config {

    /**
     * Describes the structure of parameters for the function.
     *
     * @return external_function_parameters
     */
    public static function set_plugin_config_parameters() {
        return new external_function_parameters(
            array (
                'pluginname' => new external_value(PARAM_RAW, 'Plugin Name', 'local_edwiserreports', 0),
                'configname' => new external_value(PARAM_RAW, 'Config Name', '', 0),
                'value' => new external_value(PARAM_RAW, 'Value', VALUE_DEFAULT, true)
            )
        );
    }

    /**
     * Set plugin configuration
     *
     * @param  string $pluginname Plugin name
     * @param  string $configname Configuration name
     * @return object             COnfiguration
     */
    public static function set_plugin_config($pluginname, $configname, $value = true) {
        // Get Plugin config.
        $res = new stdClass();
        $res->success = set_config($configname, $value, $pluginname);

        return $res;
    }
    /**
     * Describes the structure of the function return value.
     *
     * @return external_single_structure
     */
    public static function set_plugin_config_returns() {
        return new \external_single_structure(
            array(
                'success' => new external_value(PARAM_BOOL, 'Status', null)
            )
        );
    }
}
