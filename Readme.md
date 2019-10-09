# Library CMS Project

This site will be a full functional Content Management System for a small Library.
It will be able to view the books in them, add new ones, edit existing books as well as delete them.

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
If you don't have your own database, you can import that file through phpmyadmin.  Note that you can only import an sql file into a blank database, so you can either make a new empty database, or empty your exisiting one.  
Remember at the end of your day to export the sql file and include it in your project so you can continue with the information which you added in this class.

## Tasks
**Task 1 - Wed 9th October**  
Prepare the PHP project to also include movies.    
You are to create at least these files and include all the nessessary html code
- allMovies.php
- addMovie.php
- singleMovie.php

Look on the equivalent in books for examples

Design them slightly differently than we have with our books section so that you aren't just copying the same thing.

Also prepare your database by making at least making a class diagram for how your movies and directors table will look. Whatever information you would like to have in your tables is up to you, but it must at least include 4 columns in your movies table. Don't just use the same columns as we have used for books.  
If you would like you can then create your table through phpmyadmin, but make sure that you export your database when you are finished and include it in your project so it gets sent up to git.
