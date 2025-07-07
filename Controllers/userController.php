<?php

class FreshExtension_user_Controller extends FreshRSS_user_Controller {
	public function profileAction(): void {
		$username = Minz_Session::param('currentUser', '_');
		if ($username === 'demo' && Minz_Request::isPost()) {
			$url_redirect = array('c' => 'user', 'a' => 'profile');
			Minz_Request::bad('You can’t change the demo user.', $url_redirect);
		} else {
			parent::profileAction();
		}
	}

	private static function notAllowed(): bool {
		$username = Minz_Request::param('username');
		if ($username === 'demo' && Minz_Request::isPost()) {
			$url_redirect = array('c' => 'user', 'a' => 'details', 'params' => [
				'username' => $username,
			]);
			Minz_Request::bad('You can’t change the demo user.', $url_redirect);
			return true;
		}
		return false;
	}

	public function manageAction(): void {
		if (self::notAllowed()) return;
		parent::manageAction();
	}

	/*
	 * Block other functions called by manageAction()
	 * See: https://github.com/FreshRSS/FreshRSS/blob/ce22997dfbe4a8f2a6efa6f77d5b0bfc7b2dabd1/app/Controllers/userController.php#L189-L211
	 */

	public function deleteAction(): void {
		if (self::notAllowed()) return;
		parent::deleteAction();
	}
	public function updateAction(): void {
		if (self::notAllowed()) return;
		parent::updateAction();
	}
	public function purgeAction(): void {
		if (self::notAllowed()) return;
		parent::purgeAction();
	}
	public function promoteAction(): void {
		if (self::notAllowed()) return;
		parent::promoteAction();
	}
	public function demoteAction(): void {
		if (self::notAllowed()) return;
		parent::demoteAction();
	}
	public function enableAction(): void {
		if (self::notAllowed()) return;
		parent::enableAction();
	}
	public function disableAction(): void {
		if (self::notAllowed()) return;
		parent::disableAction();
	}

	/* end */
}
