<?php

class FreshExtension_extension_Controller extends FreshRSS_extension_Controller {
	public function disableAction(): void {
		$ext_name = urldecode(Minz_Request::param('e'));
		if ($ext_name === 'Demo') {
			$url_redirect = array('c' => 'extension', 'a' => 'index');
			Minz_Request::bad('You can’t disable the Demo extension', $url_redirect);
		} else {
			parent::disableAction();
		}
	}

	public function removeAction(): void {
		$ext_name = urldecode(Minz_Request::paramString('e'));
		if (in_array($ext_name, ['Demo', 'User JS', 'User CSS'])) {
			$url_redirect = array('c' => 'extension', 'a' => 'index');
			Minz_Request::bad('You can’t remove the <em>' . $ext_name . '</em> extension', $url_redirect);
		} else {
			parent::removeAction();
		}
	}

	public function configureAction(): void {
		$username = Minz_User::name();
		$ext_name = urldecode(Minz_Request::paramString('e'));
		if (Minz_Request::isPost() && $username === 'demo' && ($ext_name === 'User JS' || $ext_name === 'User CSS')) {
			$url_redirect = array('c' => 'extension', 'a' => 'index');
			Minz_Request::bad('You can’t make changes to JS/CSS on the <em>demo</em> user. Please use a different user.', $url_redirect);
			return;
		}
		parent::configureAction();
	}
}
