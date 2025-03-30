# eCommerce TALL Stack Project

## Overview

This project is a full-stack eCommerce solution built using the TALL stack:
- **Tailwind CSS:** For modern, responsive styling.
- **Alpine.js:** For lightweight JavaScript interactivity.
- **Laravel:** The PHP framework powering the backend.
- **Livewire:** For dynamic, reactive components without writing much JavaScript.
- **Filament:** For a sleek admin dashboard to manage products, categories, and orders.

The project includes both an admin panel (using Filament) and a customer-facing website. Administrators can manage products, categories (with subcategory support), and orders, while customers can browse products, add items to their cart, place orders, and view their order details.

## Features

### Admin Panel (Filament)
- **Product Management:** Create, edit, delete, and list products.
- **Category Management:** Create, edit, delete, and list categories with optional subcategory support.
- **Order Management:** View and update order statuses.
- **Dashboard:** A dedicated area for administrators.

### Customer-Facing Site
- **Product Listing:** Livewire-powered product listing with search, sorting, and pagination.
- **Product Details:** View detailed information about each product.
- **Category Listing:** Browse products by category.
- **Shopping Cart:** Add and remove products from the cart.
- **Order Form:** Place orders using a dynamic, reactive form.
- **Authentication:** Login, register, and logout features.

## Tech Stack

- **Backend:** Laravel (9/10)
- **Frontend:** Tailwind CSS, Alpine.js, Livewire
- **Admin Dashboard:** Filament
- **Database:** MySQL (or any supported by Laravel)
- **Build Tool:** Vite

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/ecommerce-tall.git
   cd ecommerce-tall
   ```

2. **Install Composer Dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM Dependencies:**
   ```bash
   npm install
   ```

4. **Configure Environment:**
   - Copy the `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update your database credentials and other configuration settings in `.env`.

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

7. **Compile Assets:**
   ```bash
   npm run dev
   ```

## Usage

### Admin Panel
- **Access:** Visit `/admin` (or the configured Filament route) to log in as an administrator.
- **Manage:** Use the Filament dashboard to manage products, categories, and orders.

### Customer-Facing Pages
- **Home Page:** `/`
- **Product Listing:** `/products`
- **Category Listing:** `/categories`
- **Cart:** `/cart`
- **Order Details:** `/orders`
- **Authentication:**
  - **Login:** `/login`
  - **Register:** `/register`

## Livewire Components

- **ProductList:**  
  Displays products dynamically with search, sorting, pagination, and modals for editing/adding products.

- **OrderForm:**  
  Provides a dynamic form for customers to place orders.

- **CategoryList:**  
  Manages category listing and adding new categories.

## Filament Resources

- **ProductResource:**  
  For admin CRUD operations on products.
  
- **CategoryResource:**  
  For admin CRUD operations on categories (supports subcategories).
  
- **OrderResource:**  
  For admin management of orders.

## Routes

- **Admin Routes (Filament):**  
  Filament automatically registers routes for its resources. These are typically accessed under `/admin`.

- **Customer Routes (Controllers & Livewire):**

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your improvements. For major changes, open an issue first to discuss what you would like to change.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgments

- [Laravel](https://laravel.com)
- [Livewire](https://laravel-livewire.com)
- [Tailwind CSS](https://tailwindcss.com)
- [Filament](https://filamentphp.com)
- [Alpine.js](https://alpinejs.dev)

