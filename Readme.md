# Library CMS Project

This site will be a full functional Content Management System for a small Library.
It will be able to view the books in them, add new ones, edit existing books as well as delete them.

## Before you start
Because we are still developing this project, you need to make sure that your server will render out your php errors. If you don't, then if your php code has an error, you won't be able to see the website at all and it will give you a 500 error.  
You need to check your php.ini file in your server, to find out where that file is create a new file called info.php and paste the code bellow.
```php
<?php
    phpinfo();
 ?>
```

This will show you the config variables for your server and one of them will also show you where in your server is your php.ini file.
You need to find these 3 variables and change them to the values bellow.
```ini
display_errors=On
post_max_size=200M
upload_max_filesize=200M

```
They will each be at different lines depending on what server you are on.


## Installation

This project requires a stable version of  [composer](https://getcomposer.org/) to run.

```bash
# Clone the repo
git clone https://github.com/19WDWU02/Library-CMS.git
cd Library-CMS
# Install the dependancies
composer install
```

Create a .env file in your root directory which will include the variable names needed for the project.

```shell
PROJECT_URL=

DB_HOST=
DB_USERNAME=
DB_PASSWORD=
DB_TABLE=
```
A .env.example file has been provided.

### Database set up
This project also requires a database, I have provided my working database file which you can access at 1902Library.sql.  
If you don't have your own database, you can import that file through phpmyadmin.  Note that you can only import an sql file into a blank database, so you can either make a new empty database, or empty your existing one.  
Remember at the end of your day to export the sql file and include it in your project so you can continue with the information which you added in this class.

## Tasks
**Task 1 - Wed 9th October**  
Prepare the PHP project to also include movies.    
You are to create at least these files and include all the necessary html code
- allMovies.php
- addMovie.php
- singleMovie.php

Look on the equivalent in books for examples

Design them slightly differently than we have with our books section so that you aren't just copying the same thing.

Also prepare your database by making at least making a class diagram for how your movies and directors table will look. Whatever information you would like to have in your tables is up to you, but it must at least include 4 columns in your movies table. Don't just use the same columns as we have used for books.  
If you would like you can then create your table through phpmyadmin, but make sure that you export your database when you are finished and include it in your project so it gets sent up to git.

**Task 2 - Thur 10th October**  
Add your tables for movies and directors into your database.  
On your addMovie.php, validate your movies form with php validation when you submit the form. Remember to use the POST array to get values.  
Errors should appear in a bootstrap alert just like the books form.  

Something to remember, when you connect your two tables together by creating their relationship, both columns need to have a key, your id column has a primary key, and your director_id needs to have a key as well. To do that you need to click the index button on the structure tab of your movies table. You should then see a grey key appear next to it.

**Task 3 - Fri 11th October**  
Finish your movies form to be able to successfully add directors and movies into the database.  
Because we haven't added the ability to prevent duplicate authors to be added into our database, at this stage, after you have successfully added in your first director, comment out the code to add a director and just set the $directorID variable to whatever the id of the director that you have tested as. In our addBook.php file, we do this on line 54-60.  

Once you have added in a movie, then show them all on your allMovies.php page, and then the single Movie on singleMovie.php page as well.

You can also create a 404.php file in a folder called errors/.

**Task 4 - Mon 14th October**  
Fix error on movies where the add form should go to the single movie that you just added.  
Prevent duplicate directors from being added into the directors table. If they already exist, then you should get the _id value of that director and save that one into the movies table.  
Join your Movies and Directors tables together, so that on your single movies page, you can see the information about the director.  
