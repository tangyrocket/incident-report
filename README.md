# Incident Report Management

This is an application for managing incident reports developed with Laravel.

## Requirements
* Composer
* npm
* MySQL or PostgreSQL

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/tangyrocket/incident-report.git
   cd incident-report
   ```

2. Install PHP dependencies:
    ```bash
    composer install
    ```
    
3. Copy the environment configuration file and generate the application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure the database in the .env file. Open the file and update the following lines with your database information:
   ```doenv
   DB_CONNECTION=mysql # or pgsql for PostgreSQL
   DB_HOST=127.0.0.1
   DB_PORT=3306 # or 5432 for PostgreSQL
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

5. Create the database:
   ```bash
   CREATE DATABASE your_database_name
   ```
   
6. Run the migrations to create the tables in the database (first create database with your motor):
   ```bash
   php artisan migrate
   ```

7. Optional: If you want to seed the database with test data, run:
   ```bash
   php artisan db:seed
   ```

8. Compile the application's assets:
   * For production:
     ```bash
     npm run build
     ```
   * For development:
     ```bash
     npm run dev
     ```

9. Optimize the application's configuration:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Usage
Once the above steps are completed, you can access the application in your preferred web browser. Make sure the web server is properly configured to point to the public directory of your Laravel application.

*To create incident reports, you need the mobile app contained in the repository <https://github.com/tangyrocket/incident-report.git>*
