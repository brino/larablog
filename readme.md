# LaraBlog - Simple Laravel Blog

LaraBlog is a simple blog application for posting articles and photos! It can be used as a personal site, or with multiple contributors.
It uses the Filesystem/Cloud storage layer in laravel to store the images and photos. Elasticsearch is used for searching articles. D3 is bundled in with jquery,bootstrap and 
other js libs with Elixir. Also includes an xml sitemap generator.

## License

Larablog is released under the MIT Open Source License, <https://opensource.org/licenses/MIT>

## Copyright

LaraBlog &copy; 2016 Brian Mix

## Installation

1. clone repository `git clone https://github.com/brino/larablog.git blog`
2. change directory into blog `cd blog`
2. run composer `composer install` to install php packages
3. run npm `npm install` to install js packages
4. run gulp `gulp` to build assets

## About Me Page

To display content on the "about" page, create a template at /resources/views/about/me.blade.php. Or, you can use the following command from the project root `touch resources/views/about/me.blade.php`

## Registration

Set `APP_REGISTER=true` in your **.env** file to enable user registration.

## Filesystem Cloud Storage Symlink

This project uses the Filesystem/Cloud storage component of Laravel, as such you need to set up the symlink for the photos to be publicly available.

> The public disk is meant for files that are going to be publicly accessible. By default, the public disk uses the local 
> driver and stores these files in **storage/app/public**. To make them accessible from the web, you should create a symbolic 
> link from **public/storage** to **storage/app/public**.

So, like this ... starting from the **/blog/public** directory`ln -s ../storage/app/public storage`

