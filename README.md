
# Healthcare Management System (Symfony)

## Overview

This project is a web-based Healthcare Management System built with Symfony 5

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- Symfony 5
- MySQL or PostgreSQL
- Node.js and npm

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/haider0708/PROJET-WEB-SYMFONY.git
   cd healthcare-system-symfony
   ```

2. Configure database settings in the `.env` file:
   ```plaintext
   DATABASE_URL=mysql://username:password@127.0.0.1:3306/healthcare_db
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install
   npm run dev
   ```

4. Set up the database schema:
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

### Usage

1. Run the Symfony server:
   ```bash
   symfony server:start
   ```

2. Access the application at `http://localhost:8000`. Register as a user or log in with admin credentials.

### Security & Additional Features

- **Two-Factor Authentication**: Adds an extra security layer with a secondary verification code.
- **CAPTCHA**: Prevents bot logins and strengthens security.
- **Data Encryption**: User data is encrypted using SHA-2 for enhanced security.
- **PC Notifications**: Real-time in-app notifications.
- **ChatGPT**: Integrated ChatGPT bot for interactive assistance.
- **PDF Reading Bot**: Reads medical PDFs and extracts relevant data.
- **Password Reset**: Enables secure, automated password resets.

## Built With

- Symfony 5 - PHP framework
- Doctrine ORM - For database interactions
- SHA-2 - For secure data encryption
- OpenAI API - For ChatGPT bot functionality
- PDF parsing library - For handling PDF files

## License

Licensed under the MIT License - see the [LICENSE](LICENSE) file.
