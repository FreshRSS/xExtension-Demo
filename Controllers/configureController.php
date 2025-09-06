<?php

class FreshExtension_configure_Controller extends FreshRSS_configure_Controller {
	public function readingAction(): void {
	    Minz_Request::_param('lazyload', true); // Allowing to change this option is not a good idea here
	    parent::readingAction();
	}
}

