# Employee_Management_System_Laravel

# Employee Management System Using Laravel

## Project Overview
This Employee Management System is a Laravel-based web application designed to streamline employee management within an organization. It includes features for multiple authentication roles, employee information management, attendance tracking, and leave management, providing a secure and user-friendly interface for admins and employees alike.

## Features
- **Multiple Authentication**: Secure, role-based access for admins, HR personnel, and employees.
- **Employee Management**: CRUD operations for employee records.
- **Attendance and Leave Tracking**: Log employee attendance and manage leave requests.
- **Responsive Interface**: Built with Bootstrap for a mobile-friendly experience.

## Installation

1. **Clone the Repository**:
   git clone https://github.com/MonihaPS/Employee_Management_System_Laravel

2. **Install Dependencies**:
composer install
npm install

3. **Environment Setup**:
Duplicate the .env.example file and rename it to .env.
Configure the database settings in the .env file.

4. **Generate Application Key**:
php artisan key:generate

7. **Run Migrations**:
php artisan migrate

8. **Start the Server**:
php artisan serve


# Usage
Admin Role: Can manage employee profiles, oversee attendance, and handle leave applications.
Employee Role: Can view and update their own profile, check attendance, and apply for leave.


# Built With
Backend: Laravel
Frontend: Bootstrap, jQuery
Database: MySQL

# Acknowledgments
Special thanks to uSiS Technologies and mentor Mary Hema Latha Y for guidance and support during the internship.

