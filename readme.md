
# About Techdetector

This a web fingerprinting application, it detects back end technologies of a given domain by using the node module `wappalyzer`. And the app also finds the *whois* information and *geoip location* by using freegeoip. You can also print the report if you want to.

# Intro
The goal of Technology Detector is to help web developers, Security researchers, Domain Buyers and web designers find out what technologies web pages are using which might help them to decide what technologies to implement themselves. One of the key area of web application fingerprinting is **penetration testing**. One of the first tasks when conducting a web application penetration test is to try to identify the version of the web server and the web application. The reason for that is that it allows us to discover all the well-known vulnerabilities that are affecting the web server and the application. Tech Detector can also help businesses with its website technology profiler tool which provides details about a website like what technology, programming language, content management system and web server is used while building the website. There is also a facility to find the domain details when a domain is given which is called Whois. So to identify and track a domain is not an easy task. Tech Detector has a facility to lookup the domain details also.
The Application can also find the IP address used by the domain name, Also track down the server Geo location. Pairing of IP address to a geographical location is called geolocation. . This application can track country, state, city, latitude and longitude of an IP address.

# Basic tasks Techdetector can do for you.

1. Find Whois Information
2. Find IP Geolocation
3. Find the applications, frameworks, and other technologies used.
4. Print Generated Report

# Courtesy
*I am highly indebted to the following people/tools for which they made it possible for me to build this tool.*

1. [wappalyzer](http://wappalyzer.com), [github - repo](https://github.com/AliasIO/Wappalyzer) - This tool is actually the heart of techdetector .
2. [Laravel ](https://laravel.com/)
3. [Free Jio ip ](http://freegeoip.net) - A wonderful Tool for tracking geo ip location.
4. [Jomit Jose](https://github.com/jomoos) - Without him, I am just another  [real world programmer](http://imgur.com/a/SohjD)

# Installation

**clone this repo**
`git clone https://github.com/ppshobi/tech-detector.git`

**install dependencies**

`composer update`

cd into repo

**Generate artisan key**

`php artisan generate:key`

**Clear Cache**

`php artisan clear:cache`

**Install Node modules**

`npm install`

**Run Laravel**

`php artisan serve`

Goto `localhost:8000` in your browser