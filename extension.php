<?php

class DemoExtension extends Minz_Extension {
    public function install() {
        $files_to_install = array(
            '/data/config-user.custom.php' => DATA_PATH . '/config-user.custom.php',
            '/data/default-feeds.opml.xml' => DATA_PATH . '/opml.xml',
        );

        foreach ($files_to_install as $src_file => $dest_file) {
            $res = copy($this->getPath() . $src_file, $dest_file);
            if (!$res) {
                return false;
            }
        }

        return true;
    }

    public function uninstall() {
        $files_to_unlink = array(
            DATA_PATH . '/config-user.custom.php',
            DATA_PATH . '/opml.xml',
        );

        foreach ($files_to_unlink as $file) {
            if (file_exists($file)) {
                $res = unlink($file);
                if (!$res) {
                    return false;
                }
            }
        }
        return true;
    }

    public function authAutofill(string $field_name): string {
        if (Minz_Request::is('auth', 'formLogin') ||
        	Minz_Request::is('auth', 'reauth')
        ) {
        	return match ($field_name) {
        		'username' => 'demo',
        		'password' => 'demodemo',
        		default => '',
        	};
        }
        return '';
    }

    public function init() {
        $this->registerHook(Minz_HookType::AutofillField, [$this, 'authAutofill']);
        $this->registerController('extension');
        $this->registerController('user');
        $this->registerController('auth');
        $this->registerController('configure');
        $this->registerViews();
    }
}
