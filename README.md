# 🛒 Computer Parts E-Commerce Web Application

A full-featured E-Commerce Web App built with **PHP Laravel**, **MySQL**, **jQuery**, **JavaScript**, **HTML**, **CSS**, and **Bootstrap**. This project is focused on selling **computer parts** online and includes a custom **PC Builder** tool, making it easy for users to build their own PC configurations and download a summary in PDF format.

---

## 🚀 Features

### 🛍️ E-Commerce Core

* Product listing with detailed specifications
* Product color and specification options
* Product card & checkout system
* Coupon-based discounts
* Banner and slider management
* Payment integration:

  * **SSLCommerz**
  * **Cash on Delivery (COD)**
* Email notifications for orders and updates
* SMS gateway integration for real-time alerts

### 🖥️ PC Builder Tool

* Interactive PC Builder to create custom PC builds
* Component compatibility validation
* Export PC builds as downloadable PDFs

### 🔧 Admin Backend

* Role & Permission Management (using **Spatie**)
* Category and Product management (CRUD)
* Upload and manage product images
* Add/delete/edit coupons, banners, and sliders

---

## 🧰 Tech Stack

* **Backend:** PHP, Laravel
* **Frontend:** HTML, CSS, Bootstrap, JavaScript, jQuery
* **Database:** MySQL
* **Packages & Tools:**

  * Spatie Role & Permission
  * SSLCommerz Payment Gateway
  * DomPDF for PDF generation
  * Laravel Notifications (Email & SMS)

---

## 📩 Notifications

* **Email:** Order confirmations and status updates
* **SMS:** Real-time updates via integrated gateway

---

## 📂 Installation

```bash
git clone (https://github.com/imashiqe/bazar_ecommerce).git
cd your-repo-name
composer install
cp .env.example .env
php artisan key:generate
# Configure DB credentials in .env
php artisan migrate --seed
php artisan serve
```

---

## 📷 Screenshots

> (Include screenshots of homepage, product details page, PC builder, admin dashboard, etc.)

---

## 📄 License

This project is licensed under the MIT License.


