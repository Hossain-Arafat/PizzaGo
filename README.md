# PizzaGo - Online Pizza Ordering & Management System

![GitHub](https://img.shields.io/badge/License-MIT-green)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-blueviolet)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-blue)
![Status](https://img.shields.io/badge/Status-Active-brightgreen)

---

## 📋 Table of Contents

- [Overview](#overview)
- [Problem Statement](#problem-statement)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Architecture & Workflow](#architecture--workflow)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Installation & Setup](#installation--setup)
- [Usage Instructions](#usage-instructions)
- [API Reference](#api-reference)
- [Role-Based Access](#role-based-access)
- [Future Improvements](#future-improvements)
- [Contributing](#contributing)
- [License](#license)

---

## 🎯 Overview

**PizzaGo** is a comprehensive online pizza ordering and management system built with PHP and MySQL. It enables customers to browse pizza menus, place orders, and manage their accounts, while providing administrators and staff members with tools to manage inventory, orders, and customer information.

The application follows the **Model-View-Controller (MVC)** architectural pattern, ensuring clean separation of concerns, maintainability, and scalability.

---

## 💡 Problem Statement

Traditional pizza shop ordering systems suffer from several limitations:

- **Manual Order Management**: Time-consuming manual entry processes
- **Limited Visibility**: Customers lack real-time order status tracking
- **Inventory Confusion**: Staff struggle to manage pizza availability efficiently
- **No Customer History**: Absence of order history and profile management
- **Scalability Issues**: Difficulty in managing multiple orders simultaneously

**PizzaGo** solves these challenges by providing:
- Automated order placement and tracking
- Real-time inventory management
- Multi-role user system (Customer, Admin, Staff)
- Comprehensive order history and analytics
- Scalable cloud-ready architecture

---

## ✨ Features

### 👤 Customer Features
- **User Authentication**: Secure registration and login system
- **Browse Menu**: View all available pizzas with descriptions and prices
- **Shopping Cart**: Add/remove items and manage quantities
- **Order Management**: Place orders with automatic cart calculation including delivery fees
- **Order Tracking**: View order history and current order status
- **Profile Management**: Update personal information and manage account settings
- **Password Management**: Change password and password recovery functionality

### 🛡️ Admin Features
- **Dashboard Analytics**: 
  - Total orders count
  - Total sales revenue
  - Total customers and staff count
  - Recent orders overview
- **Pizza Inventory Management**:
  - Add new pizzas with descriptions and pricing
  - Edit existing pizza details
  - Delete pizzas from inventory
  - Manage pizza availability (in-stock/out-of-stock)
- **Staff Management**:
  - Add new staff members
  - View all staff information
  - Delete staff accounts
- **Order Management**:
  - View all customer orders
  - Update order status (pending, preparing, ready, delivered)
  - Track sales metrics

### 👨‍💼 Staff Features
- **Assigned Orders**: View orders assigned to them
- **Order Status Updates**: Update pizza status during preparation
- **Order Details**: View complete order information with customer details

---

## 🛠️ Tech Stack

| Layer | Technology | Version |
|-------|-----------|---------|
| **Backend** | PHP | 7.4+ |
| **Database** | MySQL | 5.7+ |
| **Frontend** | HTML5, CSS3, JavaScript | Native |
| **Architecture** | MVC Pattern | - |
| **Server** | Apache/Nginx | - |
| **Session Management** | PHP Sessions | Built-in |
| **Database Driver** | MySQLi | Procedural |

---

## 🏗️ Architecture & Workflow

### MVC Architecture Pattern

```
┌─────────────────────────────────────────────────────────┐
│                        VIEW Layer                        │
│  (HTML Forms, PHP Templates, User Interfaces)           │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│                    CONTROLLER Layer                      │
│  (Request Processing, Business Logic, Session Mgmt)    │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│                      MODEL Layer                         │
│  (Database Queries, Data Operations, Transactions)     │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│                    DATABASE Layer                        │
│              (MySQL Tables & Relationships)             │
└─────────────────────────────────────────────────────────┘
```

### User Journey Flow

```
┌─────────────────────────┐
│   Anonymous User        │
└────────────┬────────────┘
             │
      ┌──────┴──────┐
      │             │
      ▼             ▼
   Login        Sign Up
      │             │
      └──────┬──────┘
             │
             ▼
    ┌────────────────────┐
    │  Authentication    │
    │  & Session Start   │
    └────────┬───────────┘
             │
      ┌──────┴──────┬────────────┐
      │             │            │
      ▼             ▼            ▼
   Customer      Admin         Staff
      │             │            │
      ├─Browse Menu ├─Dashboard ├─View Orders
      ├─Add to Cart ├─Manage    ├─Update
      ├─Checkout   │ Inventory  │ Status
      ├─Track      ├─Manage    │
      │ Orders     │ Staff    │
      └─Profile    ├─Orders   │
                   └─Reports  └─End
```

---

## 📁 Project Structure

```
PizzaGo/
├── 📄 index.php                    # Landing page (public)
├── 📁 controller/                  # Business logic controllers
│   ├── addPizzaController.php       # Add pizza functionality
│   ├── addStaffController.php       # Add staff functionality
│   ├── deletePizzaController.php    # Delete pizza handler
│   ├── deleteStaffController.php    # Delete staff handler
│   ├── forgetPassController.php     # Password recovery logic
│   ├── loginController.php          # Login & authentication
│   ├── logoutController.php         # Session termination
│   ├── orderController.php          # Order placement & cart management
│   ├── passwordController.php       # Password change handler
│   ├── pizzaAvailabilityController.php  # Inventory management
│   ├── pizzaStatusController.php    # Order status updates
│   ├── profileController.php        # Profile update handler
│   ├── signupController.php         # User registration logic
│   └── updatePizzaController.php    # Pizza update handler
│
├── 📁 model/                       # Database abstraction layer
│   ├── connection.php              # MySQL connection management
│   ├── order.php                   # Order-related DB operations
│   ├── pizza.php                   # Pizza-related DB operations
│   └── user.php                    # User-related DB operations
│
├── 📁 view/                        # User interface templates
│   ├── add_pizza.php               # Add pizza form (admin)
│   ├── add_staff.php               # Add staff form (admin)
│   ├── assigned.php                # Staff assignments view
│   ├── availability.php            # Pizza availability management
│   ├── cart.php                    # Shopping cart interface
│   ├── change_password.php         # Password change form
│   ├── dashboard.php               # Admin dashboard
│   ├── edit_pizza.php              # Edit pizza form
│   ├── footer.php                  # Common footer component
│   ├── forget.php                  # Password recovery form
│   ├── header.php                  # Common header component
│   ├── login.php                   # Login form
│   ├── manage_pizzas.php           # Pizza management interface
│   ├── menu.php                    # Customer menu display
│   ├── navigationBar.php           # Navigation component
│   ├── orders.php                  # Customer orders view
│   ├── profile.php                 # User profile view
│   ├── sidebar.php                 # Admin sidebar navigation
│   ├── signup.php                  # Registration form
│   ├── staff.php                   # Staff management interface
│   └── update.php                  # Order status update form
│
├── 📁 css/                         # Stylesheets
│   ├── add_pizza.css               # Add pizza styles
│   ├── add_staff.css               # Add staff styles
│   ├── assigned.css                # Assignments styles
│   ├── availability.css            # Availability styles
│   ├── cart.css                    # Cart styles
│   ├── change_password.css         # Password change styles
│   ├── common.css                  # Common/shared styles
│   ├── dashboard.css               # Dashboard styles
│   ├── edit_pizza.css              # Edit pizza styles
│   ├── forget.css                  # Password recovery styles
│   ├── home.css                    # Home page styles
│   ├── login.css                   # Login styles
│   ├── manage_pizzas.css           # Pizza management styles
│   ├── menu.css                    # Menu styles
│   ├── navBar.css                  # Navigation styles
│   ├── orders.css                  # Orders styles
│   ├── profile.css                 # Profile styles
│   ├── sidebar.css                 # Sidebar styles
│   ├── signup.css                  # Signup styles
│   ├── staff.css                   # Staff styles
│   └── update.css                  # Update styles
│
├── 📁 image/                       # Static assets
│   ├── logo.png                    # PizzaGo logo
│   ├── Margherita.jpg              # Pizza images
│   ├── Pepperoni.jpg
│   └── Chicken Dominator.jpg
│
└── 📄 README.md                    # This file
```

### Key Design Patterns

- **MVC Pattern**: Separation of Model, View, and Controller layers
- **Data Access Object (DAO)**: Database operations abstracted in model layer
- **Session Management**: PHP sessions for user state management
- **Transaction Management**: Database transactions for order placement integrity

---

## 🗄️ Database Schema

### Tables Overview

#### `users` Table
```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin', 'staff') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Columns:**
- `id`: Unique user identifier
- `name`: User's full name
- `email`: User's email address (unique)
- `password`: Hashed password
- `role`: User role (customer, admin, or staff)
- `created_at`: Account creation timestamp

---

#### `pizzas` Table
```sql
CREATE TABLE pizzas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    availability ENUM('in_stock', 'out_of_stock') DEFAULT 'in_stock',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Columns:**
- `id`: Unique pizza identifier
- `name`: Pizza name (unique)
- `description`: Pizza ingredients and details
- `price`: Pizza price in currency
- `availability`: Stock status
- `created_at`: Record creation timestamp

---

#### `orders` Table
```sql
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'preparing', 'ready', 'delivered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
);
```

**Columns:**
- `id`: Unique order identifier
- `customer_id`: Reference to customer (user)
- `total_amount`: Total order amount including delivery fee (৳60.00)
- `status`: Order processing status
- `created_at`: Order placement timestamp

---

#### `order_items` Table
```sql
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    pizza_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (pizza_id) REFERENCES pizzas(id)
);
```

**Columns:**
- `id`: Unique order item identifier
- `order_id`: Reference to order
- `pizza_id`: Reference to pizza product
- `quantity`: Number of pizzas ordered
- `price`: Price per pizza at order time

---

### Database Relationships

```
users
  ├─── (1:N) ──→ orders (customer_id)
  │
  └─── (1:N) ──→ order_items (implicit through orders)

pizzas
  └─── (1:N) ──→ order_items (pizza_id)
```

---

## 🚀 Installation & Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Git (optional, for cloning)

### Step 1: Clone or Download Repository

```bash
# Clone using Git
git clone https://github.com/Hossain-Arafat/PizzaGo.git
cd PizzaGo

# OR manually download and extract the ZIP file
```

### Step 2: Set Up Database

1. **Create Database:**
```bash
mysql -u root -p
```

2. **Run SQL Script:**
```sql
CREATE DATABASE pizzago;
USE pizzago;

-- Users Table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin', 'staff') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Pizzas Table
CREATE TABLE pizzas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    availability ENUM('in_stock', 'out_of_stock') DEFAULT 'in_stock',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'preparing', 'ready', 'delivered') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Order Items Table
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    pizza_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (pizza_id) REFERENCES pizzas(id)
);

-- Insert sample data
INSERT INTO users (name, email, password, role) VALUES 
('Admin User', 'admin@pizzago.com', 'admin123', 'admin'),
('John Customer', 'john@example.com', 'john12345', 'customer'),
('Jane Staff', 'jane@example.com', 'jane12345', 'staff');

INSERT INTO pizzas (name, description, price, availability) VALUES 
('Margherita', 'Classic tomato and mozzarella', 350.00, 'in_stock'),
('Pepperoni', 'Spicy pepperoni with cheese', 450.00, 'in_stock'),
('Chicken Dominator', 'Four mouthwatering chicken toppings', 550.00, 'in_stock');
```

### Step 3: Configure Database Connection

Edit `model/connection.php`:

```php
<?php
function dbConnection()
{
    $hostName  = "localhost";  // Your MySQL host
    $userName  = "root";       // Your MySQL username
    $password  = "";           // Your MySQL password
    $dbName    = "pizzago";    // Your database name

    $conn = mysqli_connect($hostName, $userName, $password, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
```

### Step 4: Deploy to Web Server

**Option A: Apache (XAMPP/WAMP/LAMP)**
```bash
# Copy project to htdocs (Windows)
# Copy: PizzaGo/ → C:/xampp/htdocs/

# OR copy to /var/www/html (Linux)
sudo cp -r PizzaGo /var/www/html/
sudo chown -R www-data:www-data /var/www/html/PizzaGo
```

**Option B: Nginx**
```nginx
server {
    listen 80;
    server_name pizzago.local;
    root /var/www/pizzago;

    location / {
        index index.php;
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

### Step 5: Access the Application

```
http://localhost/PizzaGo/      # Local development
http://pizzago.local/          # Production (with proper DNS)
```

---

## 📖 Usage Instructions

### 🏠 Landing Page
1. Navigate to the home page
2. View featured pizzas (Margherita, Pepperoni, Chicken Dominator)
3. Click "Login" to access your account or "Sign Up" to create a new one

### 👤 Customer Workflow

**Registration:**
1. Click "Sign Up" on the landing page
2. Enter your name, email, and password
3. Submit the form
4. You will be automatically logged in as a customer

**Browsing & Ordering:**
1. After login, view the "Menu"
2. Browse available pizzas with descriptions and prices
3. Click "Add to Cart" for pizzas (buttons disabled if out of stock)
4. Navigate to "Cart" to review your order
5. Modify quantities or remove items as needed
6. Click "Place Order" to complete purchase
7. A delivery fee of ৳60.00 is automatically added

**Managing Orders:**
1. Go to "Orders" to see all your past orders
2. View order ID, amount, status, and creation date
3. Track order status: Pending → Preparing → Ready → Delivered

**Account Management:**
1. Click "Profile" to view and edit your information
2. Go to "Change Password" to update your password
3. Use "Forget Password" if you need to recover your account

### 🛡️ Admin Workflow

**Dashboard Overview:**
1. After admin login, view the dashboard
2. See key metrics:
   - Total Orders
   - Total Sales Revenue
   - Total Customers
   - Total Staff Members
3. View recent orders with customer details

**Pizza Inventory Management:**
1. Go to "Manage Pizzas"
2. View all pizzas in a table format
3. Click "Edit" to modify pizza details (name, description, price)
4. Click "Delete" to remove a pizza
5. Click "Add Pizza" to create new menu items

**Pizza Availability:**
1. Go to "Availability"
2. Check/uncheck pizzas to set them as in-stock or out-of-stock
3. Update availability affects customer ordering ability

**Staff Management:**
1. Go to "Staff"
2. View all staff members
3. Click "Add Staff" to onboard new employees
4. Click "Delete" to remove staff members

**Order Management:**
1. View all customer orders in the dashboard
2. Click "Update" on orders to change status
3. Track order progress from pending to delivered

### 👨‍💼 Staff Workflow

**Assigned Orders:**
1. After staff login, go to "Assigned Orders"
2. View orders assigned to you
3. Click "Update" to change order status

**Order Status Updates:**
1. View order details (ID, customer name, pizzas, date)
2. Update status:
   - Pending (waiting to start)
   - Preparing (cooking in progress)
   - Ready (finished, awaiting pickup/delivery)
   - Delivered (order completed)

---

## 🔌 API Reference

### Authentication Endpoints

#### Login
**Endpoint:** `controller/loginController.php`
**Method:** POST
```
POST /controller/loginController.php

Parameters:
- email (string): User email
- password (string): User password (min 6 chars)

Response:
SUCCESS|../view/[dashboard.php|menu.php|assigned.php]
or
Invalid Credentials
or
Email and Password are required.
```

#### Logout
**Endpoint:** `controller/logoutController.php`
```
GET/POST /controller/logoutController.php

Response: Session destroyed, redirect to home
```

#### Register
**Endpoint:** `controller/signupController.php`
**Method:** POST
```
POST /controller/signupController.php

Parameters:
- name (string): Full name
- email (string): Valid email
- password (string): Min 6 characters
- confirm_password (string): Must match password

Response:
SUCCESS or error message
```

---

### Order Management Endpoints

#### Add to Cart
**Endpoint:** `controller/orderController.php`
**Method:** POST
```
POST /controller/orderController.php

Parameters:
- pizza_id (int): Pizza ID
- add_to_cart (string): Button flag

Response: Redirect to ../view/cart.php
```

#### Place Order
**Endpoint:** `controller/orderController.php`
**Method:** POST
```
POST /controller/orderController.php

Parameters:
- place_order (string): Button flag
- (cart from session)

Response: 
- Creates order with delivery fee ৳60.00
- Redirect to ../view/orders.php
```

#### Remove Item from Cart
**Endpoint:** `controller/orderController.php`
**Method:** POST
```
POST /controller/orderController.php

Parameters:
- pizza_id (int): Pizza ID to remove
- remove_item (string): Button flag

Response: Redirect to ../view/cart.php
```

---

### Pizza Management Endpoints

#### Add Pizza (Admin)
**Endpoint:** `controller/addPizzaController.php`
**Method:** POST
```
POST /controller/addPizzaController.php

Parameters:
- name (string): Pizza name (unique)
- description (string): Pizza details
- price (float): Pizza price
- availability (string): 'in_stock' or 'out_of_stock'

Response: Redirect with success/error message
```

#### Update Pizza (Admin)
**Endpoint:** `controller/updatePizzaController.php`
**Method:** POST
```
POST /controller/updatePizzaController.php

Parameters:
- id (int): Pizza ID
- name (string): Updated name
- description (string): Updated description
- price (float): Updated price
- availability (string): Updated availability

Response: Redirect with success/error message
```

#### Delete Pizza (Admin)
**Endpoint:** `controller/deletePizzaController.php`
**Method:** POST
```
POST /controller/deletePizzaController.php

Parameters:
- pizza_id (int): Pizza ID to delete

Response: Redirect to manage_pizzas.php
```

#### Update Availability (Admin)
**Endpoint:** `controller/pizzaAvailabilityController.php`
**Method:** POST
```
POST /controller/pizzaAvailabilityController.php

Parameters:
- in_stock_pizzas (array): IDs of pizzas in stock
- (All others set to out_of_stock)

Response: Redirect to availability.php
```

---

### Staff Management Endpoints

#### Add Staff (Admin)
**Endpoint:** `controller/addStaffController.php`
**Method:** POST
```
POST /controller/addStaffController.php

Parameters:
- name (string): Staff member name
- email (string): Staff email
- password (string): Initial password

Response: Success/error message
```

#### Delete Staff (Admin)
**Endpoint:** `controller/deleteStaffController.php`
**Method:** POST
```
POST /controller/deleteStaffController.php

Parameters:
- staff_id (int): Staff member ID

Response: Redirect to staff.php
```

---

### Order Status Endpoints

#### Update Order Status (Admin/Staff)
**Endpoint:** `controller/pizzaStatusController.php`
**Method:** POST
```
POST /controller/pizzaStatusController.php

Parameters:
- order_id (int): Order ID
- status (string): 'pending'|'preparing'|'ready'|'delivered'

Response: Redirect with status update confirmation
```

---

### Profile Management Endpoints

#### Update Profile
**Endpoint:** `controller/profileController.php`
**Method:** POST
```
POST /controller/profileController.php

Parameters:
- name (string): Updated name
- email (string): Updated email

Response: Profile updated successfully
```

#### Change Password
**Endpoint:** `controller/passwordController.php`
**Method:** POST
```
POST /controller/passwordController.php

Parameters:
- old_password (string): Current password
- new_password (string): New password (min 6 chars)
- confirm_password (string): Password confirmation

Response: Success/error message
```

#### Forget Password
**Endpoint:** `controller/forgetPassController.php`
**Method:** POST
```
POST /controller/forgetPassController.php

Parameters:
- email (string): User email

Response: Password recovery process
```

---

## 👥 Role-Based Access

| Feature | Customer | Admin | Staff |
|---------|----------|-------|-------|
| View Menu | ✅ | ❌ | ❌ |
| Place Order | ✅ | ❌ | ❌ |
| View Own Orders | ✅ | ❌ | ❌ |
| Edit Profile | ✅ | ✅ | ✅ |
| Change Password | ✅ | ✅ | ✅ |
| View Dashboard | ❌ | ✅ | ❌ |
| Manage Pizzas | ❌ | ✅ | ❌ |
| Manage Staff | ❌ | ✅ | ❌ |
| Manage Availability | ❌ | ✅ | ❌ |
| View All Orders | ❌ | ✅ | ✅ |
| Update Order Status | ❌ | ✅ | ✅ |
| View Assigned Orders | ❌ | ❌ | ✅ |

---

## 🔐 Security Considerations

### Current Implementation
- **Session-Based Authentication**: PHP sessions for user state management
- **Input Validation**: Email format and password length validation
- **User Roles**: Role-based access control (RBAC) for different features

### Recommended Enhancements
- **Password Hashing**: Implement bcrypt or Argon2 instead of plaintext
- **SQL Injection Prevention**: Use prepared statements with parameterized queries
- **CSRF Protection**: Add CSRF tokens to forms
- **XSS Protection**: Implement output encoding for all user data
- **HTTPS**: Deploy with SSL/TLS certificates
- **Rate Limiting**: Prevent brute force attacks on login

---

## 🚦 Order Status Flow

```
New Order Placed
      │
      ▼
   PENDING
  (Awaiting Kitchen)
      │
      ▼
  PREPARING
(In Kitchen/Cooking)
      │
      ▼
   READY
(Ready for Pickup/Delivery)
      │
      ▼
  DELIVERED
  (Completed)
```

---

## 💳 Pricing & Fees

- **Delivery Fee**: ৳60.00 (automatically added to all orders)
- **Sample Prices**:
  - Margherita: ৳350.00
  - Pepperoni: ৳450.00
  - Chicken Dominator: ৳550.00

---

## 🔄 Key Business Logic

### Order Processing Flow

1. **Cart Management**: Items stored in `$_SESSION['cart']` array
2. **Order Creation**: Transaction-based insertion into `orders` and `order_items`
3. **Calculation**:
   ```
   Total = (Pizza Price × Quantity) + Delivery Fee
   ```
4. **Delivery Fee**: ৳60.00 automatically added to all orders
5. **Status Tracking**: Order progresses through 4 states

### Pizza Availability Management

- Admin can bulk update pizza availability
- Out-of-stock pizzas show disabled "Add to Cart" buttons
- Availability affects customer ordering options

### Dashboard Analytics

- **Total Orders**: COUNT(*) from orders table
- **Total Sales**: SUM(total_amount) from orders
- **Total Customers**: COUNT(*) where role='customer'
- **Total Staff**: COUNT(*) where role='staff'

---

## 🎯 Future Improvements

### Short-term Enhancements
1. **Password Hashing**: Implement bcrypt password hashing
2. **SQL Injection Prevention**: Migrate to prepared statements
3. **CSRF Protection**: Add token-based CSRF protection
4. **Input Sanitization**: Comprehensive XSS prevention
5. **Payment Gateway Integration**: Stripe/PayPal integration for online payments
6. **Email Notifications**: Automated order status emails to customers
7. **Pagination**: Add pagination to tables (orders, pizzas, staff)

### Medium-term Features
1. **Search & Filtering**: Advanced pizza search and order filtering
2. **Ratings & Reviews**: Customer feedback system
3. **Discount Codes**: Coupon/promo code system
4. **Delivery Tracking**: Real-time delivery map tracking
5. **Multiple Locations**: Support for multiple pizza shop branches
6. **Inventory Alerts**: Low-stock notifications
7. **API Documentation**: RESTful API for mobile apps

### Long-term Architecture
1. **RESTful API**: Complete REST API with proper versioning
2. **Mobile Apps**: Native iOS/Android applications
3. **Real-time Updates**: WebSocket implementation for live order tracking
4. **Microservices**: Decompose into services (order, inventory, user, payment)
5. **Cloud Deployment**: AWS/GCP/Azure deployment with CI/CD
6. **Analytics Dashboard**: Advanced business intelligence and reporting
7. **AI/ML Features**: Order recommendation engine, demand forecasting
8. **Compliance**: GDPR, PCI DSS, and data protection compliance

---

## 🤝 Contributing

### How to Contribute

1. **Fork the Repository**
```bash
git clone https://github.com/Hossain-Arafat/PizzaGo.git
cd PizzaGo
```

2. **Create Feature Branch**
```bash
git checkout -b feature/your-feature-name
```

3. **Make Changes**
- Follow MVC pattern
- Add/update necessary model, view, and controller files
- Test thoroughly in local environment

4. **Commit Changes**
```bash
git add .
git commit -m "feat: Add your feature description"
```

5. **Push to Branch**
```bash
git push origin feature/your-feature-name
```

6. **Create Pull Request**
- Provide clear description of changes
- Link related issues if any
- Follow the existing code style

### Contribution Guidelines
- **Code Style**: Follow PSR-12 PHP coding standards
- **Comments**: Add meaningful comments for complex logic
- **Security**: Always consider security implications
- **Testing**: Test all functionality locally before submitting
- **Documentation**: Update relevant documentation

### Areas Needing Help
- [ ] Security hardening (SQL injection, XSS prevention)
- [ ] Payment gateway integration
- [ ] Mobile app development
- [ ] API development
- [ ] Database query optimization
- [ ] UI/UX improvements
- [ ] Performance optimization

---

## 📄 License

This project is open-source and available under the **MIT License**. See LICENSE file for details.

---

## 👨‍💻 Author

**Hossain Arafat**  
GitHub: [@Hossain-Arafat](https://github.com/Hossain-Arafat)

---

## 📞 Support

For issues, questions, or feedback:
- **GitHub Issues**: [Create an issue](https://github.com/Hossain-Arafat/PizzaGo/issues)
- **Email**: Contact through GitHub profile

---

## 📊 Project Stats

- **Language**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Lines of Code**: 3,600+
- **Controllers**: 15+
- **Views**: 20+
- **Database Tables**: 4
- **Created**: January 2026

---

## 🎓 Learning Resources

### Recommended Reading
- [PHP Security Best Practices](https://www.php.net/manual/en/security.php)
- [OWASP Top 10](https://owasp.org/Top10/)
- [MySQL Best Practices](https://dev.mysql.com/doc/)
- [MVC Architecture Pattern](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)

---

**Last Updated:** January 2026  
**Version:** 1.0.0  
**Status:** Active & Maintained

---

## 🌟 Show Your Support

If you find this project helpful, please consider:
- ⭐ Starring the repository
- 📢 Sharing with others
- 🤝 Contributing improvements
- 💬 Providing feedback and suggestions

---

*PizzaGo - Making Pizza Ordering Simple & Delicious!* 🍕
