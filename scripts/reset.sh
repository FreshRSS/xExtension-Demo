#!/bin/sh

CURRENT_DIR=`dirname "$0"`
DATA_DIR=$CURRENT_DIR/../../../data
CLI_DIR=$CURRENT_DIR/../../../cli

# Default user cannot be deleted by the CLI, so we delete the users manually
rm -rf $DATA_DIR/users/*
mkdir $DATA_DIR/users/_
$CLI_DIR/create-user.php --user demo --password 'demodemo' --language en
$CLI_DIR/actualize-user.php --user demo

$CLI_DIR/reconfigure.php \
	--default-user demo \
	--auth-type form \
	--environment production \
	--base-url https://demo.freshrss.org \
	--language en \
	--title FreshRSS \
	--allow-anonymous \
	--db-type sqlite
