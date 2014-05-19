<?php

class Auth_Login_Portalauth extends \Auth\Auth_Login_Driver
{
	/**
	 * Perform the actual login check
	 *
	 * @return  bool
	 */
	protected function perform_check(){}

	/**
	 * Perform the actual login check
	 *
	 * @return  bool
	 */
	public function validate_user(){}

	/**
	 * Login method
	 *
	 * @return  bool  whether login succeeded
	 */
	public function login(){}

	/**
	 * Logout method
	 */
	public function logout(){}

	/**
	 * Get User Identifier of the current logged in user
	 * in the form: array(driver_id, user_id)
	 *
	 * @return  array
	 */
	public function get_user_id(){}

	/**
	 * Get User Groups of the current logged in user
	 * in the form: array(array(driver_id, group_id), array(driver_id, group_id), etc)
	 *
	 * @return  array
	 */
	public function get_groups(){}

	/**
	 * Get emailaddress of the current logged in user
	 *
	 * @return  string
	 */
	public function get_email(){}

	/**
	 * Get screen name of the current logged in user
	 *
	 * @return  string
	 */
	public function get_screen_name(){}
}

?>