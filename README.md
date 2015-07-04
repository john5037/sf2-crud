# Basic Crud Application for Article in Symfony2

# First we have to update the composer by for install the synfony components and dependecies

# Create Database and Update the schema
   php app/console doctrine:database:create
   php app/console doctrine:schema:update --force for insert automatically or --dump-sql for insert queries Manually.

# Add js and Css For Web UI
   php app/console assets:install
   
   For Running the Application
# http://{localhost}/web/app_dev.php


