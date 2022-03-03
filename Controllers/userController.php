<?php

class FreshExtension_user_Controller extends FreshRSS_user_Controller {
	public function profileAction() {
		$username = Minz_Session::param('currentUser', '_');
		if ($username === 'demo' && Minz_Request::isPost()) {
			$url_redirect = array('c' => 'user', 'a' => 'profile');
			return Minz_Request::bad('You can’t change the demo user.', $url_redirect);
		} else {
			return parent::profileAction();
		}
	}

	public function manageAction() {
		$username = Minz_Request::param('username');
		if ($username === 'demo' && Minz_Request::isPost()) {
			$url_redirect = array('c' => 'user', 'a' => 'details', 'params' => [
				'username' => $username,
			]);
			return Minz_Request::bad('You can’t change the demo user.', $url_redirect);
		} else {
			return parent::manageAction();
		}
	}
}
