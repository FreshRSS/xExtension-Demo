#!/bin/sh

CURRENT_DIR=`dirname "$0"`
DATA_DIR=$CURRENT_DIR/../../../data
CLI_DIR=$CURRENT_DIR/../../../cli

# Default user cannot be deleted by the CLI, so we delete the users manually
rm -rf $DATA_DIR/users/*/*
$CLI_DIR/create-user.php --user demo --password 'demodemo' --language en

$CLI_DIR/reconfigure.php \
	--default_user demo \
	--auth_type form \
	--environment production \
	--base_url https://demo.freshrss.org \
	--language en \
	--title FreshRSS \
	--allow_anonymous \
	--db-type sqlite
