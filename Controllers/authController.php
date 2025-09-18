<?php

class FreshExtension_auth_Controller extends FreshRSS_auth_Controller {
	public function indexAction(): void {
	    $auth_type = Minz_Request::paramString('auth_type') ?: 'form';
	    if (Minz_Request::isPost() && $auth_type !== 'form') {
	        Minz_Request::bad('You can’t change the authentication method', ['c' => 'auth']);
	        return;
	    }
	    Minz_Request::_param('unsafe_autologin', false); // Disallow enabling unsafe autologin, since it may cause issues

	    parent::indexAction();
	}
}
