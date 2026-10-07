# 🌷 Paper & Petals

Aesthetic stationery shopping website built using **PHP, MySQL, HTML and CSS**.

Paper & Petals is a simple e-commerce web application designed for stationery lovers. Users can create an account, log in, browse stationery products, add products to a shopping cart, proceed to checkout, and place orders.

---

## ✨ Features

- 👤 User Registration
- 🔐 User Login & Logout
- 🌷 Personalized Home Page
- 🛍️ Browse Stationery Products
- 🛒 Add Products to Cart
- 🔢 Manage Product Quantities
- 💰 Automatic Subtotal Calculation
- 🧾 GST Calculation
- 📦 Checkout & Order Placement
- 🗄️ Store Orders in MySQL Database
- 🎨 Aesthetic Baby-Pink UI
- 📱 Responsive Product Grid

---

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend development and application logic |
| MySQL | Database management |
| HTML | Website structure |
| CSS | Styling and responsive design |
| XAMPP | Local development server |
| phpMyAdmin | Database management |

---

## 🗄️ Database
The project uses a MySQL database named: stationery_shop

Database Tables:

Users (id,name,email,password) - Stores registered user information.

Products (id,name,category,price,image,description) - Stores stationery product information.

Orders (id,user_id,cutsomer_name,phone,address,items,total,order_date) - Stores customer order information.

---

## 🚀 How to Run the Project

1. Install XAMPP
Install XAMPP and make sure Apache and MySQL are available.

2. Clone the Repository
git clone https://github.com/YOUR-USERNAME/paper-and-petals.git

3. Move the Project
Place the project inside the XAMPP htdocs folder:
/Applications/XAMPP/htdocs/

The final path should look like:
/Applications/XAMPP/htdocs/StationeryShop/

4. Start XAMPP
Start:
- Apache
- MySQL

5. Create the Database
Open phpMyAdmin:
http://localhost/phpmyadmin

Create a database named:
stationery_shop

Create the required tables:
- users
- products
- orders

6. Configure Database Connection
The database connection is handled by:
db.php

The default local configuration is:
$conn = mysqli_connect("127.0.0.1", "root", "", "stationery_shop", 3306);

Update these values if your local MySQL configuration is different.

7. Run the Website
Open:
http://localhost/StationeryShop/signup.php

Create an account and log in to start shopping.

--- 

## 📸 Screenshots

Screenshots of the application can be added here.
Home Page
Add screenshot here
Login Page
Add screenshot here
Product Page
Add screenshot here
Shopping Cart
Add screenshot here
Checkout
Add screenshot here

---

👩‍💻 Developer
Heer Somaiya
