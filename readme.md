# LaraBlog - Simple Laravel Blog

LaraBlog is a simple blog application for posting articles and photos! It can be used as a personal site, or with multiple contributors.
It uses the Filesystem/Cloud storage layer in laravel to store the images and photos. Laravel Scout with Elasticsearch 5.x Engine is used for searching articles. D3 is bundled in with VueJS Bulma and 
other js libs with Mix. Also includes an xml sitemap generator.

## License

Larablog is released under the MIT Open Source License, <https://opensource.org/licenses/MIT>

## Installation

1. clone repository `git clone https://github.com/brino/larablog.git blog`
2. change directory into blog `cd blog`
2. run composer `composer install` to install php packages
3. run npm `npm install` to install js packages
4. compile assets `npm run dev` to build assets for dev ... run `npm run production` for production

## Registration

Set `APP_REGISTER=true` in your **.env** file to enable user registration.

## Filesystem Cloud Storage Symlink

This project uses the Filesystem/Cloud storage component of Laravel, as such you need to set up the symlink for the photos to be publicly available.

> The public disk is meant for files that are going to be publicly accessible. By default, the public disk uses the local 
> driver and stores these files in **storage/app/public**. To make them accessible from the web, you should create a symbolic 
> link from **public/storage** to **storage/app/public**.

So, like this ... starting from the **/blog/public** directory `ln -s ../storage/app/public storage`
