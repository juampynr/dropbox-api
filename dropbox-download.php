<?php

/**
 * Downloads a file from a Dropbox app into the given destination.
 *
 * Usage: php vendor/juampynr/dropbox-api/dropbox-download.php [path to file at Dropbox] [path to destination including filename]
 */

require_once './vendor/autoload.php';

use Dotenv\Dotenv;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

// Load environment variables from a .env file if the file is present.
$dotenv = new Dotenv('./');
$dotenv->safeLoad();


// Configure the Dropbox API handler.
$app = new DropboxApp(getenv('DROPBOX_CLIENT_ID'), getenv('DROPBOX_CLIENT_SECRET'), getenv('DROPBOX_ACCESS_TOKEN'));
$dropbox = new Dropbox($app);

// Download the file.
$dropbox->listFolder('/');
$file = $dropbox->download('/' . $argv[1], $argv[2]);
