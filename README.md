# 🍕 PizzaGo — Online Pizza Ordering & Management System

<div align="center">

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Architecture](https://img.shields.io/badge/Architecture-MVC-blue?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

A full-stack pizza ordering and management platform built with **PHP**, **MySQL**, and the **MVC architectural pattern**.

Designed to streamline restaurant operations through role-based access control, real-time order workflows, inventory management, and customer order tracking.

</div>

---

## 📌 Project Overview

**PizzaGo** is a web-based restaurant management system that digitizes the end-to-end pizza ordering workflow for customers, staff, and administrators.

The platform enables customers to browse menus, place orders, manage carts, and track order status, while administrators and staff can manage inventory, monitor orders, and handle operational workflows through dedicated dashboards.

The project was developed using a traditional **PHP + MySQL stack** with a clean **MVC architecture** to improve maintainability, separation of concerns, and scalability.

### Key Engineering Highlights

- Role-based authentication system (Customer, Staff, Admin)
- MVC-based backend architecture
- Session-driven cart and authentication handling
- Order lifecycle management system
- Inventory availability management
- Transaction-oriented order processing workflow
- Modular controller/model structure for maintainability

---

## ✨ Core Features

### 👤 Customer Module
- Secure registration and login system
- Browse pizza menu with pricing and descriptions
- Add/remove items from shopping cart
- Place orders with automatic total calculation
- Track live order status progression
- View order history
- Update profile and manage account settings

### 🛡️ Admin Module
- Dashboard with operational analytics
- Pizza inventory management
- Add, edit, and remove menu items
- Manage pizza stock availability
- Staff account management
- Monitor and update customer orders
- View sales and order statistics

### 👨‍🍳 Staff Module
- View assigned customer orders
- Update preparation and delivery status
- Access order and customer details

---

## 🏗️ System Architecture

PizzaGo follows the **Model-View-Controller (MVC)** architecture to separate application logic, presentation, and data access.

```text
User Interface (Views)
        │
        ▼
Controllers (Business Logic)
        │
        ▼
Models (Database Operations)
        │
        ▼
MySQL Database
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
      ├─Browse Menu ├─Dashboard  ├─View Orders
      ├─Add to Cart ├─Manage     ├─Update
      ├─Checkout    │ Inventory  │ Status
      ├─Track       ├─Manage     ├─Update
      │ Orders      │ Staff      │ Pizza
      └─Profile     ├─Orders     └─Profile
                    └─Reports    
```

### Architecture Decisions

- **MVC Pattern** was used to improve code organization and maintainability.
- **PHP Sessions** manage authentication and shopping cart state.
- **Separated Controllers** simplify feature scaling and debugging.
- **MySQL Relational Design** ensures structured order and inventory relationships.

---

## 🛠️ Tech Stack

| Category | Technology |
|---|---|
| Backend | PHP 7.4+ |
| Database | MySQL 5.7+ |
| Frontend | HTML5, CSS3, JavaScript |
| Architecture | MVC |
| Server | Apache  |
| Database Access | MySQLi | Procedural |
| Authentication | PHP Sessions |

---

## 📂 Project Structure

```bash
PizzaGo/
│
├── assets/          # Screenshots of UI previews
├── controller/      # Application business logic
├── model/           # Database interaction layer
├── view/            # Frontend templates & pages
├── css/             # Modular styling files
├── image/           # Static assets and pizza images
│
├── index.php        # Application entry point
└── README.md
```

### Important Modules

| Module | Responsibility |
|---|---|
| `loginController.php` | Authentication & session management |
| `orderController.php` | Cart and order processing |
| `pizzaAvailabilityController.php` | Inventory availability control |
| `pizzaStatusController.php` | Order status workflow |
| `profileController.php` | User profile management |

---

## 🗄️ Database Design

The system uses a relational database structure consisting of:

- `users`
- `pizzas`
- `orders`
- `order_items`

### Relationship Overview

```text
users ──────< orders ──────< order_items >────── pizzas
```

### Database Features

- Foreign key relationships
- Cascading delete support
- Structured order-item mapping
- Role-based user management

---

## 🚦 Order Workflow

```text
Pending
   ↓
Preparing
   ↓
Ready
   ↓
Delivered
```

This workflow allows staff and admins to manage order progression in real time.

---

## 🔐 Security Considerations

### Currently Implemented
- Session-based authentication
- Role-based authorization
- Basic input validation

### Recommended Improvements
- Password hashing with bcrypt/Argon2
- Prepared statements to prevent SQL injection
- CSRF protection
- Output sanitization for XSS prevention
- HTTPS deployment

---

## 🚀 Installation & Setup

### Prerequisites

- PHP 7.4+
- MySQL 5.7+
- Apache
- XAMPP

---

### 1️⃣ Clone Repository

```bash
git clone https://github.com/Hossain-Arafat/PizzaGo.git
cd PizzaGo
```

---

### 2️⃣ Create Database

Run SQL Script:
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
('Customer1', 'customer1@example.com', 'customer12345', 'customer'),
('Staff1', 'staff1@example.com', 'staff12345', 'staff');

INSERT INTO pizzas (name, description, price, availability) VALUES 
('Margherita', 'Classic tomato and mozzarella', 350.00, 'in_stock'),
('Pepperoni', 'Spicy pepperoni with cheese', 450.00, 'in_stock'),
('Chicken Dominator', 'Four mouthwatering chicken toppings', 550.00, 'in_stock');
```

---

### 3️⃣ Configure Database Connection

Update:

```bash
model/connection.php
```

with your local database credentials.

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

---

### 4️⃣ Run the Project

Move the project into your web server directory:

```bash
C:/xampp/htdocs/
```

Start the Apache and MySQL module in XAMPP control panel and then open:

```text
http://localhost/PizzaGo/
```

---

## 📸 Screenshots / Demo

### 🏠 Landing Page
Main entry interface showcasing featured pizzas and authentication options.

![Landing Page](assets/Landing%20Page.png)

---

### 🍕 Customer Menu
Interactive menu interface where customers can browse available pizzas and add items to cart.

![Menu Page](assets/Customer%20Menu%20Page.png)

---

### 🛒 Shopping Cart
Cart management system with quantity handling and automatic order calculation.

![Shopping Cart](assets/Shopping%20Cart.png)

---

### 📊 Admin Dashboard
Administrative dashboard displaying operational metrics, recent orders, and system overview.

![Dashboard](assets/Admin%20Dashboard.png)

---

### 🧾 Pizza Management Panel
Inventory management interface for adding, updating, and managing pizza availability.

![Pizza Panel](assets/Pizza%20Management.png)

---

### 🚚 Order Tracking
Order status management workflow used by staffs.

![Order Tracking](assets/Order%20Tracking.png)

---

## 📈 Key Functionalities

### Customer Flow
```text
Register/Login
    ↓
Browse Menu
    ↓
Add to Cart
    ↓
Place Order
    ↓
Track Order Status
```

### Admin Flow
```text
Manage Inventory
    ↓
Monitor Orders
    ↓
Update Pizza
    ↓
Manage Pizza
    ↓
Update Staff
    ↓
Manage Staff
```
### Staff Flow
```text
View Orders
    ↓
Update Order
    ↓
Update Pizza
```
---

## 🎯 Future Improvements

- Payment gateway integration
- Email notifications
- REST API support
- Mobile application
- Real-time order tracking
- Search and filtering system
- Ratings & reviews
- Analytics dashboard
- WebSocket-based live updates

---

## 🤝 Contributing

Contributions are welcome.

### Development Workflow

```bash
# Create feature branch
git checkout -b feature/feature-name

# Commit changes
git commit -m "feat: add new feature"

# Push branch
git push origin feature/feature-name
```

### Contribution Areas
- Security enhancements
- Performance optimization
- UI/UX improvements
- API development
- Query optimization

---

## 📄 License

This project is licensed under the [**MIT License**](LICENSE).

---

## 👨‍💻 Author

- GitHub: [Hossain-Arafat](https://github.com/Hossain-Arafat?utm_source=chatgpt.com)
- Repository: [PizzaGo Repository](https://github.com/Hossain-Arafat/PizzaGo?utm_source=chatgpt.com)

---

<div align="center">

### 🍕 PizzaGo — Simplifying Restaurant Ordering Workflows

If you found this project interesting, consider giving it a ⭐ on GitHub.

</div>
