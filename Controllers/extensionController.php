<?php

class FreshExtension_extension_Controller extends FreshRSS_extension_Controller {
	public function disableAction() {
		$ext_name = urldecode(Minz_Request::param('e'));
		if ($ext_name === 'Demo') {
			$url_redirect = array('c' => 'extension', 'a' => 'index');
			return Minz_Request::bad('You can’t disable the Demo extension', $url_redirect);
		} else {
			return parent::disableAction();
		}
	}

	public function removeAction() {
		$ext_name = urldecode(Minz_Request::param('e'));
		if ($ext_name === 'Demo') {
			$url_redirect = array('c' => 'extension', 'a' => 'index');
			return Minz_Request::bad('You can’t remove the Demo extension', $url_redirect);
		} else {
			return parent::removeAction();
		}
	}
}
