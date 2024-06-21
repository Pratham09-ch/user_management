<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# User Management System

## Description

This project is a simple user management system built with Laravel. It includes features such as user registration, authentication, profile management, and password reset functionality. 

## Features

### 1. User Registration
- Users can register with their email and password.
- Email uniqueness and password strength validations are implemented.

### 2. User Authentication
- Users can log in using their registered email and password.
- Session-based authentication system is implemented.

### 3. User Profile
- Once logged in, users have access to a profile page.
- The profile page displays basic user information like email and registration date.
- Users can update their profile information.

### 4. Password Reset
- Users can request a password reset if they forget their password.
- A mechanism to send a password reset email to the user is implemented.

## Table of Contents

## Installation

To get started with the project, follow these steps:

1. Clone the repository:
   ```sh
   git clone https://github.com/Pratham09-ch/user_management.git
   
2. Database table Setup :
- Run the all migration :
    using " php artisan migrate " command
- then run seeders file :
    using this command " php artisan db:seed --class= UsersTableSeeder "
    this is for insert admin user record to the user table
- then execute this SQL query:
       to insert the record in roles table " INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Admin', 'NULL', NULL); "
      this is helps to authenticate the admin user at time of admin login.






