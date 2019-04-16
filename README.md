# Dropbox scripts to download/upload files

This repository contains a couple scripts to download and upload files
regardless of their size.

## Installation

1. Run `composer require juampynr/dropbox-api`
2. Run composer install.
3. Create a Dropbox application at https://www.dropbox.com/developers/apps/create.
4. Copy the .env.example into .env and enter the Dropbox credentials there.
5. Try uploading a file:

```
$ echo "This is some text" > some-text.txt
$ php vendor/juampynr/dropbox-api/dropbox-upload.php some-text.txt
```
6. Verify that the file was uploaded. Now try downloading it:

```
$ php vendor/juampynr/dropbox-api/dropbox-download.php some-text.txt some-text-downloaded.txt
```
