# Bookstore application using symfony 5.4

## Description
This is a bookstore application built using Symfony 5.4. It allows users to browse, search, and purchase books online. The application also provides an admin interface for managing books, authors, genres, and users.

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/hamzaaitbenyissa/symfonybookstore.git
   cd symfonybookstore
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the database:
   ```bash
   cp .env .env.local
   # Update the DATABASE_URL in .env.local with your database credentials
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

4. Start the development server:
   ```bash
   symfony server:start
   ```

## Usage
1. Access the application in your web browser at `http://localhost:8000`.
2. Browse and search for books.
3. Add books to your cart and proceed to checkout.
4. Admin users can log in to the admin interface at `http://localhost:8000/admin` to manage books, authors, genres, and users.

## Contributing
Contributions are welcome! Please follow these steps to contribute:
1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Make your changes and commit them with descriptive commit messages.
4. Push your changes to your forked repository.
5. Create a pull request to the main repository.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
