# 🧠 Personal Finance Manager
A comprehensive personal finance management system designed to help users track their expenses, create budgets, and manage their financial data. This project aims to provide a user-friendly and intuitive interface for managing personal finances, making it easier for individuals to stay on top of their financial situation.

## 🚀 Features
- User authentication and authorization
- Budget creation and management
- Transaction tracking and management
- Dashboard for visualizing financial data
- Account management and integration with budgets and transactions
- Validation and error handling for user input

## 🛠️ Tech Stack
* Frontend: Laravel AdminLTE 
* Backend: Laravel PHP framework
* Database: MySQL, SQLite, or MariaDB
* Authentication: Laravel's built-in authentication system
* Dependencies: Laravel Eloquent, Illuminate\Http\Request, and other Laravel components

## 📦 Installation
To get started with this project, follow these steps:
1. Clone the repository to your local machine
2. Install the required dependencies using Composer: `composer install`
3. Set up the database by running the migrations: `php artisan migrate`
4. Start the development server: `php artisan serve`

## 💻 Usage
1. Register a new user account or log in to an existing one
2. Create a new budget and add transactions to it
3. View the dashboard to visualize your financial data
4. Manage your accounts and integrate them with budgets and transactions

## 📂 Project Structure
```markdown
app/
Controllers/
TransactionController.php
DashboardController.php
BudgetController.php
HomeController.php
...
Models/
Budget.php
Account.php
Transaction.php
User.php
...
Providers/
AppServiceProvider.php
...
Http/
Controllers/
Auth/
LoginController.php
RegisterController.php
...
config/
auth.php
database.php
app.php
...
routes/
web.php
...
public/
index.php
...
vendor/
...
```

## 📸 Screenshots

F1 - Authentification
<img width="1357" height="609" alt="image" src="https://github.com/user-attachments/assets/ca1590bf-1fe5-41a0-a7b4-57758319835d" />

F2 - Dashboard
<img width="1357" height="609" alt="image" src="https://github.com/user-attachments/assets/e125f1d0-0343-4255-bc01-380b47b7eac0" />

F3 - Transactions BreaD
<img width="1357" height="609" alt="image" src="https://github.com/user-attachments/assets/242a81ea-9454-48b9-8050-d0bf14a75504" />

F4 - Budgets BreaD
<img width="1357" height="609" alt="image" src="https://github.com/user-attachments/assets/c26b86f0-efb1-411f-b734-9c9771713278" />

## 📝 License
This project is licensed under the MIT License.

## 💖 Thanks Message
We hope you find this project helpful in managing your personal finances. If you have any feedback or suggestions, please don't hesitate to reach out.
This is written by [readme.ai](https://readme-generator-phi.vercel.app/)
