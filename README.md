# Backend Development & Database Integration

A PHP + MySQL based authentication system with complete CRUD functionality.

## Features

- User Registration
- Secure Password Hashing
- Login Authentication
- Session Handling
- Dashboard
- Add New Users
- Edit Existing Users
- Delete Users
- Profile Management
- Profile Picture Upload
- Logout System

## Technologies Used

- PHP
- MySQL
- XAMPP
- HTML
- CSS
- Bootstrap
- JavaScript
- GitHub

## Project Repository

GitHub Repository:  
https://github.com/SailakshmiMajeti07/task2-login-ui

## How to Run

1. Start Apache and MySQL in XAMPP
2. Open phpMyAdmin
3. Create database:

```sql
task3_db
```

4. Create table: `users`

Columns:

- id (INT, AUTO_INCREMENT, PRIMARY KEY)
- name (VARCHAR 100)
- email (VARCHAR 100)
- password (VARCHAR 255)
- role (VARCHAR 20)
- profile_pic (VARCHAR 255)

5. Copy project folder into:

```text
C:\xampp\htdocs\task2-login-ui
```

6. Run project:

```text
http://localhost/task2-login-ui
```

## Project Modules

### Authentication Module
- Register new user
- Login with credentials
- Password hashing
- Session validation

### User Management Module
- Add user
- View users
- Edit user
- Delete user

### Profile Module
- Upload profile picture
- View profile information

## Author

**Majeti Sailakshmi**  
AIML Student | Full Stack Web Developer Intern
