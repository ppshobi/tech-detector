
## About Techdetector

This a web fingerprinting application, it detects back end technologies of a given domain by using the node module `wappalyzer`. And the app also finds the *whois* info and *geoip location* by using freegeoip

## Installation
clone this repo

`composer update`

cd into repo

generate artisan key

`php artisan generate:key`

Clear Cache

`php artisan clear:cache`

Install laravel npm dependencies
`npm install`

Install wappalyzer`

`npm i wappalyzer`

Run Laravel

`php artisan serve`

Goto `localhost:8000` in your browser