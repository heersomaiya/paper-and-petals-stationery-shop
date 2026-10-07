## 🌷 Paper & Petals

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

Home Page
<img width="1470" height="864" alt="Screenshot 2026-10-08 at 1 23 17 AM" src="https://github.com/user-attachments/assets/d85182a4-3756-484c-a903-507e2ddd7bf9" />

Login Page
<img width="1470" height="868" alt="Screenshot 2026-10-08 at 1 23 38 AM" src="https://github.com/user-attachments/assets/b3bcfb0b-30c6-42ef-b58c-8982b9db6472" />

Product Page
<img width="1470" height="870" alt="Screenshot 2026-10-08 at 1 25 03 AM" src="https://github.com/user-attachments/assets/8b65e301-75e4-4e9f-82ed-e3c6df39558d" />

Shopping Cart
<img width="1470" height="866" alt="Screenshot 2026-10-08 at 1 25 41 AM" src="https://github.com/user-attachments/assets/c42391ca-558e-4c40-981c-cc815682f3be" />

Checkout
<img width="1470" height="868" alt="Screenshot 2026-10-08 at 1 26 11 AM" src="https://github.com/user-attachments/assets/f1615fdc-4614-46b6-8bbb-b89bc9462ed5" />

---

👩‍💻 Developer
Heer Somaiya
