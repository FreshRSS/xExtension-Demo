<?php

class DemoExtension extends Minz_Extension {
    public function install() {
        return copy($this->getPath() . '/data/default-feeds.opml.xml', DATA_PATH . '/opml.xml');
    }

    public function uninstall() {
        return unlink(DATA_PATH . '/opml.xml');
    }

    public function init() {
        $this->registerViews();
    }
}
