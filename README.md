## [Elektroprizma - electrical equipment store (click to see deployed version)](https://elektroprizma.ba/)

This application represents e-commerce application and supports all main functionalities of e-commerce application. It uses [VOYAGER](https://voyager.devdojo.com/) admin panel to support CRUD operations over application, it's models/entities and users.

## Technologies 
- Language: PHP
- Framework: Laravel
- Database: MySql
- CSS framework: W3.CSS
- Vanilla JS 
- [VOYAGER](https://voyager.devdojo.com/) - support for admin panel

## Setup environment
Do not forget to adjust ENVIRONMENT:
- In development mode you need to run your Apache and MySql server
- .env file has to be updated with correct information. Update following entries: 

APP IDENTITY:
```
APP_NAME=DUMMY
APP_URL=DUMMY
```

DB CONNECTION:
```
DB_CONNECTION=DUMMY
DB_HOST=DUMMY
DB_PORT=DUMMY
DB_DATABASE=DUMMY
DB_USERNAME=DUMMY
DB_PASSWORD=DUMMY
```

MAIL SETUP:
```
MAIL_MAILER=DUMMY
MAIL_HOST=DUMMY
MAIL_PORT=DUMMY
MAIL_USERNAME=DUMMY
MAIL_PASSWORD=DUMMY
MAIL_ENCRYPTION=DUMMY
MAIL_FROM_ADDRESS=DUMMY
MAIL_FROM_NAME=DUMMY
MAIN_MAIL_ACCOUNT=DUMMY
```

## Run The Application
Run following commands:
### `php artisan migrate -seed` - Runs migrations and seeders to populate database with the dummy data. 
### `php artisan serve` - Runs the app in the development mode. Open [http://127.0.0.1:8000/](http://127.0.0.1:8000/) to view it in the browser.


