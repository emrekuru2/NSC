# Cricket Nova Scotia 

## Project structure
```
.
└── cricket-nova-scotia/
    ├── app/                Main application. Source files are here!
    │   ├── Config/         Stores the configuration files.
    │   ├── Controllers/    Controllers determine the program flow.
    │   ├── Database/       Stores the database migrations and seeds files.
    │   ├── Filters/        Stores filter classes that can run before and after controller.
    │   ├── Helpers/        Helpers store collections of standalone functions.
    │   ├── Language/       Multiple language support reads the language strings from here.
    │   ├── Libraries/      Useful classes that don't fit in another category.
    │   ├── Models/         Models work with the database to represent the business entities.
    │   ├── ThirdParty/     ThirdParty libraries that can be used in application.
    │   └── Views/          Views make up the HTML that is displayed to the client.       
    ├── public/             Where the web server serves the application. CSS, JS, and images go here.
    ├── tests/              Application tests
    ├── vendor/             Project dependencies are stored here. CodeIgniter4 is here as well.
    ├── .env                A file used for setting up general environment variables.
    ├── .gitignore          Gitignore properties.
    ├── builds              Framework specific. Shouldn't be touched.
    ├── composer.json       Composer dependency list
    ├── composer.lock       Dependency locking
    ├── LICENSE             MIT License
    ├── phpunit.xml.dist    Framework specific. Shouldn't be touched.
    ├── preload.php         Framework specific. Shouldn't be touched.
    └── spark               Framework specific. Shouldn't be touched.
```

## Setup for development environment

> The main (default) branch of the project is called **CI4**. For development purposes, please clone this branch as it has the latest code.

> Make sure you have **composer** installed. It should come pre-installed with xampp, mamp. Run below command to check if it's installed.
```sh
composer -v
```

> `CD` to you project folder and run below command to install required dependencies. :exclamation: Make sure your local web server **(apache or nginx)** is pointing to the **public** folder inside the project folder. If you are using XAMPP, you may do so by editing the php.ini file and changing the DocumentRoot and the subsequent Directory properties as such:
    DocumentRoot "C:/xampp/htdocs/cricket-nova-scotia-ci4/cricket-nova-scotia/public"
    <Directory "C:/xampp/htdocs/cricket-nova-scotia-ci4/cricket-nova-scotia/public">
Please note these are just examples. The actual directory paths may be different for your machine.

> Next, enable the php intl extension in your php.ini file. Then install the composer dependencies using the following command.
```sh
composer install
```

> To setup the project for development type the script below and follow the prompt according to your local machine environment. If you are using for development purposes, type development into the first prompt. For the database name prompt, create an empty schema of the same name that you are going to type in the prompt.
```sh
php spark setup
```

> The user emails, passwords and their roles are shown below. 

| email             | password      | role    |
|-------------------|---------------|---------|
| admin@gmail.com   | Password2023! | admin   |
| manager@gmail.com | Password2023! | manager |
| player@gmail.com  | Password2023! | player  |
| umpire@gmail.com  | Password2023! | umpire  |
| guest@gmail.com   | Password2023! | guest   |


## CodeIgniter 4 Application Starter

<details><summary>Click to expand</summary>

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

</details>
