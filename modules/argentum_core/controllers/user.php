<?php
/**
 * User Controller
 *
 * @package    Argentum
 * @author     Argentum Team
 * @copyright  (c) 2008-2010 Argentum Team
 * @license    http://www.argentuminvoice.com/license.txt
 */

class User_Controller extends Website_Controller {

	/**
	 * Displays the main user screen
	 */
	public function index() {}

	/**
	 * Performs a user login
	 */
	public function login()
	{
		if ($_POST AND Auth::instance()->login($this->input->post('username'), $this->input->post('password')))
		{
			url::redirect(arr::remove('requested_page', $_SESSION));
		}
		elseif ($_POST)
		{
			$_SESSION['message'] = 'Invalid username or password.';
		}
	}

	/**
	 * Performs a user logout
	 */
	public function logout()
	{
		Auth::instance()->logout(TRUE);
		url::redirect();
	}

	/**
	 * Displays the logged in user's timesheet
	 */
	public function timesheet()
	{
		$this->view->start_date = mktime(0, 0, 0, $_GET['start_date']['month'], $_GET['start_date']['day'], $_GET['start_date']['year']);
		$this->view->end_date = mktime(0, 0, 0, $_GET['end_date']['month'], $_GET['end_date']['day'], $_GET['end_date']['year']);
	}

	/**
	 * Displays the logged in user's projects with tickets that have been assigned to them
	 */
	public function active_projects()
	{
		$this->view->projects = $_SESSION['auth_user']->find_assigned_projects();
	}
}