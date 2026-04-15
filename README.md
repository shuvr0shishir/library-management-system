# 📚 DIU Library Management System

A full-featured **Library Management System** built with **PHP & MySQL**.
This project was developed as part of the **DBMS Lab (Complex Engineering Problem)** and demonstrates real-world database design, operations, and automation.

---

## 🚀 Live Demo

🔗 https://diu-library.page.gd

---

## 📂 GitHub Repository

🔗 https://github.com/shuvroshishir/diu-library-management-system

---

## 🎯 Core Features

### 👥 User Management (CRUD)

* Add User
* Edit User
* Delete User
* View all users
* Role-based system (Admin, Faculty, Student)
* Admin protection (cannot delete/edit)

---

### 📚 Book Management (CRUD)

* Add Book
* Edit Book
* Delete Book
* View all books
* Track quantity and availability

---

### 🔄 Book Transactions

* Assign Book to user
* Return Book
* Track:

  * Issue date
  * Return date
  * Status (assigned / returned)

---

### 📊 Dashboard

* Total Books count
* Assigned Books count
* Returned Books count
* Total Users count
* Recent transactions table

---

## 🧠 Advanced DBMS Features

A dedicated **MySQL Operations Dashboard** is implemented to demonstrate complex database queries:

### 🔹 Basic Queries

* SELECT with WHERE
* GROUP BY
* HAVING

### 🔹 Joins

* INNER JOIN
* LEFT JOIN
* RIGHT JOIN

### 🔹 Advanced Queries

* Subqueries / Nested Queries

### 🔹 Database Features

* VIEW
* TRIGGER (auto role assignment)
* STORED PROCEDURE
* TRANSACTION (with COMMIT control)

👉 All queries are dynamically executed and results are displayed in UI.

---

## ⚙️ Technologies Used

* 🖥️ Frontend: HTML, Tailwind CSS
* ⚙️ Backend: PHP
* 🗄️ Database: MySQL
* 🧰 Tools: XAMPP, phpMyAdmin

---

## 🧩 Database Design

### Main Tables:

* `users` → stores user information
* `books` → stores book details
* `transactions` → stores issue/return records

✔ Proper relational design using foreign keys
✔ Normalized structure (up to 3NF)

---

## 🔐 Security & Data Integrity

* Session-based authentication
* Role-based access control
* Admin protection (restricted actions)
* Default role handling using **Trigger**
* Transaction handling using **COMMIT**
* Input validation (basic level)

---

## 📊 Sample SQL Query

```sql
SELECT users.name, books.title, transactions.issue_date
FROM transactions
INNER JOIN users ON users.id = transactions.user_id
INNER JOIN books ON books.id = transactions.book_id;
```

---

## 🎓 Academic Objective

This project fulfills DBMS Lab requirements:

* Real-world problem solving
* Database design & normalization
* Complex SQL query implementation
* Data analysis using queries

---

## 🧠 Author

**Shishir Karmokar**
🎓 BSc in Computer Science & Engineering
🏫 Daffodil International University

---

## ⭐ Final Note

This project demonstrates both **practical implementation** and **conceptual understanding** of database systems, including advanced SQL features and real-world data management.

---
