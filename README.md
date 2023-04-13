# Ecomm-with-plain-php


## Ecommerce website with plain php

This is a simple ecommerce website with plain php. It has a simple admin panel where you can add products, categories, subcategories, and manage orders. It has a simple user panel where you can add products to cart, checkout, and manage orders.

## Installation

1. Create a database and import the database file from the database folder
    
    ```bash
    project2Database.sql
    ```

2. Clone the repository with running the run.sh file  in your instance 
    a)got to the following folder
    ```bash
    cd /var/www/html
    ```
    
    b) create a run.sh file with the following code in your instance
        ```bash
        sudo rm index.html
        sudo rm -rf Ecomm-with-plain-php
        git clone https://github.com/rajeshreddy-T/Ecomm-with-plain-php.git
        sudo cp -a Ecomm-with-plain-php/. .
        sudo rm -rf Ecomm-with-plain-php
        ```

3. Change the database credentials  in config.php file

    sudo vi config.php

    update the db credenmtials


    
4. start writing your code on login.php and register.php files to beautify the UI

# ecom-deploy
# ecom-deploy
# ecom-deploy
