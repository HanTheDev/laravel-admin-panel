# Admin Panel

## Project Explanation
This project is an admin panel built with Laravel that allows administrators to manage Categories and Products. It includes user authentication, CRUD operations, data display, and search functionality.

## Features
- User Authentication (Login/Logout)
- Manage Categories (Create, Read, Update, Delete)
- Manage Products (Create, Read, Update, Delete)
- One-to-Many relationship between Categories and Products
- Search functionality for Products
- Responsive UI using Bootstrap

## Database Design

### Tables
1. **Categories**
   - `id` (Primary Key)
   - `name` (String)
   - Timestamps (`created_at`, `updated_at`)

2. **Products**
   - `id` (Primary Key)
   - `category_id` (Foreign Key -> Categories.id)
   - `name` (String)
   - `description` (Text, nullable)
   - `price` (Decimal)
   - Timestamps (`created_at`, `updated_at`)

### Relationships
- **Category** has many **Products**
- **Product** belongs to a **Category**

## Application Screenshots

### 1. Login Page
![Login Page](screenshots/login.png)

### 2. Categories List
![Categories List](screenshots/categories.png)

### 3. Products List with Search
![Products List](screenshots/products.png)

### 4. Create/Edit Forms
![Create Category](screenshots/create_category.png)
![Create Product](screenshots/create_product.png)

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL/MariaDB

### Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/admin-panel.git
   cd admin-panel
