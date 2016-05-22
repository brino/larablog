# LaraBlog - Simple Laravel Blog

[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

LaraBlog is a simple blog application for posting articles and photos! It can be used as a personal site, or with multiple contributors

## Registration

Set APP_REGISTER=true in your .env file to enable user registration.

This blog uses the Filesystem/Cloud storage component of Laravel, as such you need to set up the symlink for the photos to work.


> The public disk is meant for files that are going to be publicly accessible. By default, the public disk uses the local 
> driver and stores these files in **storage/app/public**. To make them accessible from the web, you should create a symbolic 
> link from **public/storage** to **storage/app/public**.

