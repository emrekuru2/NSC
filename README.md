# ProjectNSCA

### Front End Information
The front end web portal can be viewed by going to this [Link](​https://web.cs.dal.ca/~projectnsca/khurramaziz_cricketassociation/client/). We have retrieved a CS account from the CS helpdesk so we can use Bluenose to host the site, and database on. To connect to **bluenose.cs.dal.ca** you are able to SSH into the server using the following credentials: **username:** `projectnsca` and the ​**password**: `projectNSCA`​. 

Updating the website can be done through SSH or any FTP Client. To connect via FTP you will use the same credentials as when you SSH **username:** `projectnsca` and the ​**password:** `projectNSCA​`. It is important to note any directories that are created will need the permissions set to `755` this can be done by running the following **command:**`~$ chmod 755 DirectoryName/`, for any file that is created it will need the permissions set to `644` this can be done by the following **command:** `~$ chmod 644 FileName.FileType.`

### Back End Information
As we are hosting this site on **bluenose.cs.dal.ca** the database is being hosted on **db.cs.dal.ca**. To make modifications using phpMyAdmin you can go to the following link [phpMyAdmin](https://myadmin.cs.dal.ca/) and login with the given credentials, **username:** `projectnsca`, ​and the **​password:** `B00projectNSCA`      

If you would like to modify the database using an IDE such as MySQL Workbench you will need to enter the SSH credentials, **hostname:** `bluenose.cs.dal.ca`, **username:** `projectnsca`, **password:** `projectNSCA`. For the MySQL connection information the following credentials should be inputted **hostname:**`db.cs.dal.ca`, **port:** `3306`, **username:**`projectNSCA`, **password:**`B00projectNSCA`

### Local Development
If a developer would like to work on the project locally, this will require an apache tool such as MAMP. This allows the developer to have their PHP requests served. Once MAMP has been downloaded and installed you will need to open the preferences tab and navigate to the web server tab, and set the `Document Root` to the client directory. You will also need to open the MAMP phpMyAdmin and run the SQL files that are located in the `db/Dump Files`, this will ensure that you have the tables setup, and temporary data to test and develop the site with.

