# HRMS (Human Resource Management System)

A comprehensive Human Resource Management System built with Laravel framework.

## Features

- Employee Management
- Attendance Tracking
- Leave Management
- Payroll Management
- Performance Management
- Recruitment Management
- Awards, Notices & Training
- And much more...

## Requirements

- PHP ^8.1
- Laravel ^10.10
- Composer
- MySQL/MariaDB

## Installation

1. Clone the repository
```bash
git clone https://github.com/mesbah-meju/hrms.git
cd hrms
```

2. Install dependencies
```bash
composer install
```

3. Copy environment file
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Configure your `.env` file with database credentials

6. Run migrations
```bash
php artisan migrate
```

7. Seed the database (optional)
```bash
php artisan db:seed
```

8. Start the development server
```bash
php artisan serve
```

## Technologies Used

- **Framework:** Laravel 10
- **PHP:** 8.1+
- **Database:** MySQL/MariaDB
- **Additional Packages:**
  - Laravel DomPDF (PDF generation)
  - Maatwebsite Excel (Excel import/export)
  - ZKTeco integration (Biometric devices)

## 👨‍💻 Developed By

**4axiz IT Ltd**

🌐 Website: https://fouraxiz.com

## 👨‍💻 Backend Developer

**Mesbah Uddin**

📧 Email: uddin.mesbaah@gmail.com  
🌐 Website: mesbahuddin.info  
💼 LinkedIn: mesbah-uddin-meju  
🐙 GitHub: mesbah-meju

## License

This project is licensed under the MIT license.
