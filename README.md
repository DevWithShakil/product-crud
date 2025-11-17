# Product Management System – Laravel CRUD

A simple Product CRUD application built with Laravel.  
This system allows users to Create, Read, Update, and Delete products using **Laravel Query Builder only**.

---

## 📌 Features

-   Create new products
-   View all products with pagination
-   Update existing products
-   Delete products
-   Image upload using storage
-   Clean Laravel folder structure
-   Query Builder used for all database operations

---

## 📌 Product Table Structure (Database->postgresql)

| Column      | Type      | Required | Description               |
| ----------- | --------- | -------- | ------------------------- |
| id          | Integer   | Yes      | Primary Key               |
| product_id  | String    | Yes      | Unique product identifier |
| name        | String    | Yes      | Product name              |
| description | Text      | No       | Product details           |
| price       | Decimal   | Yes      | Product price             |
| stock       | Integer   | No       | Available quantity        |
| image       | String    | Yes      | Image path (stored)       |
| created_at  | Timestamp | Yes      | Created time              |
| updated_at  | Timestamp | Yes      | Updated time              |

---

## 📌 Routes (Web)

-   GET /products - List all products
-   GET /products/create - Show product create form
-   POST /products - Store new product
-   GET /products/{id} - Show specific product
-   GET /products/{id}/edit - Show edit product form
-   PUT /products/{id} - Update product
-   DELETE /products/{id} - Delete product
