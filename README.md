## Project structure
```
.
└── cricket-nova-scotia/
    ├── app/                Main application. Source files are here!
    │   ├── Cells/          Modular, reusable components with business logic.
    │   ├── Config/         Stores the configuration files.
    │   ├── Controllers/    Controllers determine the program flow.
    │   ├── Database/       Stores the database migrations and seeds files.
    │   ├── Filters/        Stores filter classes that can run before and after controller.
    │   ├── Helpers/        Helpers store collections of standalone functions.
    │   ├── Language/       Multiple language support reads the language strings from here.
    │   ├── Interfaces/     Helps mantain cleaner and encapsulated code.
    │   ├── Models/         Models work with the database to represent the business entities.
    │   └── Views/          Views make up the HTML that is displayed to the client. 
    ├── public/             Where the web server serves the application. CSS, JS, and images go here.
    ├── vendor/             Project dependencies are stored here. CodeIgniter4 core files are here as well.
    ├── writable/           Application cache and upload data is stored here.
    ├── env                 A template file used for setting up environment variables.
    ├── composer.json       Composer dependency list. Dev list will not be included.
    ├── LICENSE             MIT License
    ├── preload.php         Configurations for preoloading project files.
    └── spark               Spark CLI class.
```

# CNS Setup Instructions
This tutorial will guide the users, starting from the requirements of the project to the full production environment setup.

## Server requirements

First and foremost, since this project is based on **CodeIgniter 4** framework, the requirements for the server are as follows:

 1. PHP (version 7.4 and above),
 2. Composer (version 2.0.14 and above),
 3. One of supported Databases:
	-   MySQL via the  `MySQLi`  driver (version 5.1 and above)
	-   PostgreSQL via the  `Postgre`  driver (version 7.4 and above)
	-   SQLite3 via the  `SQLite3`  driver
	-   Microsoft SQL Server via the  `SQLSRV`  driver (version 2005 and above)
	-   Oracle Database via the  `OCI8`  driver (version 12.1 and above)

> **Note**: Not all of the drivers have been converted/rewritten for CodeIgniter4. The list below shows the outstanding ones.
>-   MySQL (5.1+) via the  _pdo_  driver
>-   Oracle via the  _pdo_  drivers  
>-   PostgreSQL via the  _pdo_  driver
>-   MSSQL via the  _pdo_  driver
>-   SQLite via the  _sqlite_  (version 2) and  _pdo_  drivers
>-   CUBRID via the  _cubrid_  and  _pdo_  drivers   
>-   Interbase/Firebird via the  _ibase_  and  _pdo_  drivers
>-   ODBC via the  _odbc_  and  _pdo_  drivers (you should know that ODBC is actually an abstraction layer

## PHP Extensions

### Required Extensions

In order for the framework to work properly, there are required extensions that needs to be enabled. Most providers already enable most of these, however, here is the requirement list:

-   [intl](https://www.php.net/manual/en/intl.requirements.php)
-   [mbstring](https://www.php.net/manual/en/mbstring.requirements.php)
-   [json](https://www.php.net/manual/en/json.requirements.php)

### Optional Extensions

Here are the optional extensions. We recommend enabling them since the project package requirements might change in future.

-   [mysqlnd](https://www.php.net/manual/en/mysqlnd.install.php)  (if you use MySQL)
-   [curl](https://www.php.net/manual/en/curl.requirements.php)  (if you use  [CURLRequest](https://codeigniter4.github.io/userguide/libraries/curlrequest.html))
-   [imagick](https://www.php.net/manual/en/imagick.requirements.php)  (if you use  [Image](https://codeigniter4.github.io/userguide/libraries/images.html)  class ImageMagickHandler)
-   [gd](https://www.php.net/manual/en/image.requirements.php)  (if you use  [Image](https://codeigniter4.github.io/userguide/libraries/images.html)  class GDHandler)
-   [simplexml](https://www.php.net/manual/en/simplexml.requirements.php)  (if you format XML)

> **Note**: The following PHP extensions are required when you use a Cache server:
> -   [memcache](https://www.php.net/manual/en/memcache.requirements.php)  (if you use  [Cache](https://codeigniter4.github.io/userguide/libraries/caching.html)  class MemcachedHandler with Memcache)
> -   [memcached](https://www.php.net/manual/en/memcached.requirements.php)  (if you use  [Cache](https://codeigniter4.github.io/userguide/libraries/caching.html)  class MemcachedHandler with Memcached)   
> -   [redis](https://github.com/phpredis/phpredis)  (if you use  [Cache](https://codeigniter4.github.io/userguide/libraries/caching.html)  class RedisHandler)


<details><summary>Click to expand details on setup instructions</summary>
### Extensions management on CPanel

> **Note**: CPanel UI and layout might change based on different providers but the title names and functionalities are mostly the same. The images used in this tutorials are gathered from the internet.

1. Your Hosting Account's PHP extensions can be managed at any time, in order to do that simply access your **cPanel** → **Software** section → **Select PHP Version:**

![enter image description here](https://hostinger-a9bb9d9276c9.intercom-attachments-7.com/i/o/270708343/89215cc07304539e59738d02/3ReIbkmeHjjxGgUdxdqoEz24YzCXZi0QL1R6ouGMI-2IY3Ju3yM7V2yVDUNNU96JEQUue-rrwu7mMT2O6unDy4AQedmgJVPa1rTgDN87_3IGVGprqviJHJ1jV3umzL2SIUPXL_un)

2. On the newly opened page, select the **Extensions** tab:

![enter image description here](https://hostinger-a9bb9d9276c9.intercom-attachments-7.com/i/o/270708347/6c448d8bf222044a7ed0110e/IVvfLgTQM1Ah7wAbq0cTSNXJa3V3A7LN_FrVadDozn6b2i70Qq3Qyro3bq0ipMeRx4YpONW8lrRZd7oldlggEJLZUf7wGyY4E--kVA8fTA8T2Q4T0CCL9gG_OIPP5AxLgv1NgZ8d)

3. There you will able to see a list of extensions that can be enabled or disabled depending on your needs, just simply click on the checkmark to enable or disable it:

![enter image description here](https://hostinger-a9bb9d9276c9.intercom-attachments-7.com/i/o/270708348/4949688382ca646a084559a0/BwvV9RF3zdzpu4xJrvDMQhoPZG7GsQHNeyVhFObUsOaBJoxZ-Bz4JsM1lp5rhGVljQmUyie1c_HXW1fEqoAUKLbCnmCYww7hJkZEaRij3rb3_5blzkMtIz6hcRfldkHelnaGjmXb)

## CPanel Overall Configurations

### Database Initialization

1. To find the tool, log into cPanel and click on the **MySQL Database Wizard** option under **Databases**:

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/database1.2.png)

2. Once done, indicate the name of the new database and click on the **Next Step** button:

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/database1.3.png)

3. At Step 2 you will be prompted to indicate **MySQL User** and choose a **password** for it, reciprocally to the process described before:

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/database1.6.png)

4. The next windows will allow you to set privileges for the newly created MySQL User similarly to the process described previously.  Accordingly, you will need to choose the **All Privileges** option and click on the **Next Step** button after that:

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/database1.7.png)

5. Once done, you will get a confirmation that the MySQL User was successfully added to the MySQL Database

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/database1.8.png)

### File Management

1. Log into your **cPanel** account and navigate to **Files** section >> **File Manager** menu:

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/file1.1.png)

2. Upload the project zip file.

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/pl_file_manager_31.png)

3. In order to make the project public, the project folder must be placed in the **public_html** folder. So, make sure the **public_html** folder is empty, then extract it. 

![enter image description here](https://namecheap.simplekb.com/SiteContents/2-7C22D5236A4543EB827F3BD8936E153E/media/pl_file_manager_47.png)

4.  After the extraction, remove the zip file and move into the extracted folder. Copy everything inside it and paste it into the **public_html** folder and delete the folder that the content was copied from.


### Domain Management

Since the main domain points to the **public_html** folder, the project will not work properly because it needs to be pointed to **public_html**/**public** folder. To change that, we will have to run commands from the terminal in CPanel because CPanel does not have a GUI for that.

1. Go to the main page on CPanel.
2. In the “**ADVANCED** section on the CPanel, click the **Terminal** link or icon.
3. Read the warning and click the “I understand and want to proceed” button.
4. A terminal window will open in cPanel, and you can run your commands.

Next, the steps to change the root directory for the main domain are as follows:

 1. Navigate to **/var/cpanel/userdata/[USERNAME]/**
```shell
cd /var/cpanel/userdata/[USERNAME]/
```
2.  Edit the files below by using **nano**, **vim** or the **file manager**
```shell
/var/cpanel/userdata/[USERNAME]/[DOMAIN_NAME] 
/var/cpanel/userdata/[USERNAME]/[DOMAIN_NAME]_SSL
```
3.  In the above two files, look for the line:
```
documentroot: /home/[USERNAME]/public_html
```
4. Replace **public_html** with the desired new root location.
5. Rebuild the Apace configuration:
```shell
# /scripts/rebuildhttpdconf
```
6. Restart Apache web server:
```shell
# service httpd restart
```
7. Now, access the site. It should be loaded from the new location.

## Framework Setup

If all the steps so far were successful, the project is ready setup. First, the required dependencies needs to be installed, for that:

 1. Go to the **Terminal** again on CPanel. The instructions are given above.
 2. Go in the **public_html** folder.
```shell
cd public_html
```
 3. Run `ls` to check the current files in the directory. If there is no filled called **composer.json**, it shows there was a problem with the extraction of the project zip file.
 4. If **composer.json** is present, then run:
```shell
composer install --no-dev
```
5. After the dependencies are install successfully, the only thing left is to setup the environment file. Simply run:
```shell
php spark setup
```
6. This is a script specifically written for this project to easily setup the environment configurations. Once the script is loaded, follow these steps:

	1. Choose the **production** environment.
	2. Type in the **base url**, which is `https://[Your_URL]/` of the website. 
	3. Type in the **database hostname**, press the enter key to keep it as default. The default is localhost.
	4. Type in the **database name** which is `cricketn_[Your_database_name]`.
	5. Type in the **database username** which is `cricketn_[Your_database_username]`.
	6. Type in the **database password**.
	7. After these, simply press the enter key to set the default values for the rest of the options until you see prompt saying: `Settings applied successfully!`
	8. Lastly, **to migrate and seed the database**, simply press the enter key to finalize the setup.

</details>
