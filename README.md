# School Portal — PHP & MySQL

A beginner-friendly student management portal built with PHP, MySQL, PDO, HTML, and CSS.

## Features
- View student records
- Add students with scores from 0 to 100
- Delete student records
- Automatically show Pass / Needs improvement
- Use PDO prepared statements for database writes

## Setup
1. Install PHP and MySQL (XAMPP is one option).
2. Import `database.sql` using phpMyAdmin or the MySQL CLI.
3. Update database credentials in `config.php` if needed.
4. Put this folder in your web server directory, such as XAMPP's `htdocs`.
5. Start Apache and MySQL.
6. Visit `http://localhost/school-portal/`.

## Stack
PHP 8+, MySQL, PDO, HTML5, CSS3.

## Important
This is an educational starter project, not production-ready. For deployment, add authentication, authorization, CSRF protection, audit logging, and environment-based secrets. Never commit real passwords.
