🧩 Midterm Examination Project
📘 Project Title
Library Management System

-------------------------------------

📝 Description / Overview
This project is a Library Management System developed using Laravel, PHP, MySQL, and XAMPP. It follows the Model-View-Controller (MVC) architecture and utilizes Blade templates for dynamic and user-friendly interface rendering. The system provides full CRUD (Create, Read, Update, Delete) functionality for managing books, borrowers, and transactions within the library. The project also emphasizes proper database design and efficient data management, ensuring a smooth and organized operation for library administrators and users.

-------------------------------------

🎯 Objectives
To apply the concepts of Git and GitHub in project collaboration.  
To demonstrate knowledge of version control workflows.  
To develop and document a functional system or program.  
To promote teamwork through shared repository management.

-------------------------------------

⚙️ Features / Functionality
User authentication and role-based access (admin and user).
Book management with full CRUD operations (add, edit, delete, and view books).
Borrower and transaction management for tracking issued and returned books.
Database integration using MySQL for efficient data storage and retrieval.
MVC (Model-View-Controller) architecture implemented through Laravel framework.
Dynamic and responsive interface using Blade views for clean UI rendering.
Real-time validation and error handling using Laravel’s built-in validation system.
Organized and scalable code structure following Laravel best practices.

--------------------------------------

🧩 Installation Instructions
1. Install XAMPP
     Download and install XAMPP from https://www.apachefriends.org
     Start the Apache and MySQL modules in the XAMPP Control Panel.
2. Install Composer
     Download and install Composer from https://getcomposer.org
     Verify installation by running:
   
         composer --version
   
3. Set Up the Laravel Project
     Open Command Prompt or Visual Studio Code Terminal.
     Navigate to your XAMPP htdocs directory:
   
         cd C:\xampp\htdocs
   
     Clone or copy your Laravel project folder into htdocs.
     Navigate to your project folder:

         cd library-system

   Install project dependencies:

       composer install

4. Configure the Environment File
     Duplicate the .env.example file and rename it to .env.
     Open .env and update your database settings:

       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=library_db
       DB_USERNAME=root
       DB_PASSWORD=

5. Generate the Application Key

       php artisan key:generate

6. Set Up the Database
    Open phpMyAdmin (via http://localhost/phpmyadmin).
    Create a new database named library_db.
    Run migrations and seeders to set up tables:

       php artisan migrate --seed

7. Run the Laravel Development Server

       php artisan serve
   
   Then open your browser and go to:
👉 http://localhost:8000

--------------------------------------------

🚀 Usage
public/codesnap.png






