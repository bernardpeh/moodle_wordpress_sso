<?php

/**
* 
* @package auth_wordpress_sso
* @copyright 2012 Bernard Peh (bpeh@barrett.com,.au)
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->libdir.'/authlib.php');

/**
 * Plugin for no authentication.
 */
class auth_plugin_wordpress_sso extends auth_plugin_base {

    /**
     * Constructor.
     */
    function auth_plugin_wordpress_sso() {
        $this->authtype = 'wordpress_sso';
        $this->config = get_config('auth/wordpress_sso');
    }

    /**
     * Returns true if the username and password is correct
     *
     * @param string $username The username
     * @param string $password The password
     * @return bool Authentication success or failure.
     */
    function user_login ($username, $password) {
        // global $CFG, $DB;
        $postdata = "log=". $username ."&pwd=". $password ."&wp-submit=Log%20In&testcookie=1";
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $this->config->wordpress_url);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURL_COOKIEFILE, '');
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt ($ch, CURLOPT_POST, 1);
        $res = curl_exec ($ch);
        curl_close($ch);
        if (preg_match('/ERROR/', $res)) {
            return false;
        }
        return true;
    }

    /**
     * Updates the user's password.
     *
     * called when the user password is updated.
     *
     * @param  object  $user        User table object
     * @param  string  $newpassword Plaintext password
     * @return boolean result
     *
     */
    function user_update_password($user, $newpassword) {
        return false;
    }


    function prevent_local_passwords() {
        return true;
    }

    /**
     * Returns true if this authentication plugin is 'internal'.
     *
     * @return bool
     */
    function is_internal() {
        return true;
    }

    /**
     * Returns true if this authentication plugin can change the user's
     * password.
     *
     * @return bool
     */
    function can_change_password() {
        return false;
    }

    /**
     * Returns the URL for changing the user's pw, or empty if the default can
     * be used.
     *
     * @return moodle_url
     */
    function change_password_url() {
        return null;
    }

    /**
     * Returns true if plugin allows resetting of internal password.
     *
     * @return bool
     */
    function can_reset_password() {
        return false;
    }

    /**
     * Prints a form for configuring this authentication plugin.
     *
     * This function is called from admin/auth.php, and outputs a full page with
     * a form for configuring this plugin.
     *
     * @param array $page An object containing all the data for this page.
     */
    function config_form($config, $err, $user_fields) {
        include "form.php";
    }

    /**
     * Processes and stores configuration data for this authentication plugin.
     */
    function process_config($config) {
         // set to defaults if undefined
        if (!isset($config->wordpress_url)) {
            $config->wordpress_url = 'Please enter the wordpress login url. eg http://wordpressdomain.com/wp-login.php';
        }

        // save settings
        set_config('wordpress_url', $config->wordpress_url, 'auth/wordpress_sso');
        return true;
    }

}


