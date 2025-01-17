# Blog Post Project

A dynamic blog website built with **HTML**, **CSS**, **Bootstrap**, **JavaScript**, **PHP**, and **MySQL**. This project includes both **user** and **admin** features for creating, categorizing, editing, and deleting blog posts.

## Features

### User Features
- Browse blog posts by category.
- View individual blog posts with detailed content.
- Responsive and user-friendly design optimized for all devices.

### Admin Features
- Create new blog posts with categories.
- Edit existing blog posts.
- Delete blog posts.
- Manage posts through a secure admin panel.

## Technologies Used

### Frontend
- **HTML**: Markup structure for the website.
- **CSS**: Styling for layout and design.
- **Bootstrap**: Responsive framework for styling and components.
- **JavaScript**: Interactive features for the website.

### Backend
- **PHP**: Server-side scripting for dynamic content and functionality.

### Database
- **MySQL**: Relational database for storing blog posts and category data.

## Setup Instructions

Follow these steps to set up the project locally:

### 1. Clone the Repository
Use the following command to clone the repository:
```bash
git clone https://github.com/your-username/your-repository.git

### 2. Navigate to the Project Directory
```bash
cd your-repository

### 3. Set Up the Database
- Open your MySQL server (e.g., phpMyAdmin, Workbench, or CLI).
- Import the provided database.sql file to create the required database and tables.
- Update the database connection in the config.php file:
```bash
  <?php
  $servername = "localhost";
  $username = "your-database-username";
  $password = "your-database-password";
  $dbname = "your-database-name";
  ?>

### 4. Run the Project
- Start your local PHP server using the following command
```bash
php -S localhost:8000

Demo Video:

https://github.com/user-attachments/assets/2d698145-9785-4dbd-b4ce-1fe86e72cf31


