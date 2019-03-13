<?php

/**
 * Uploads a file to a Dropbox app folder.
 *
 * Usage: php dropbox-upload.php [path to file]
 */

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;

// Load environment variables from a .env file if the file is present.
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// Configure the Dropbox API handler.
$app = new DropboxApp(getenv('DROPBOX_CLIENT_ID'), getenv('DROPBOX_CLIENT_SECRET'), getenv('DROPBOX_ACCESS_TOKEN'));
$dropbox = new Dropbox($app);

// Upload a file.
$pathToLocalFile = __DIR__ . '/../../' . $argv[1];
$dropboxFile = new DropboxFile($pathToLocalFile);
$file = $dropbox->upload($dropboxFile, '/' . basename($argv[1]), ['mode' => 'overwrite']);
