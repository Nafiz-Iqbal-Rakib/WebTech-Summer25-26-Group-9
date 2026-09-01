CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;

CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    role VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(1000) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'active',
    PRIMARY KEY (id),
    UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS products (
    id INT NOT NULL AUTO_INCREMENT,
    seller_id INT NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    img VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    KEY seller_id (seller_id),
    CONSTRAINT products_ibfk_1 FOREIGN KEY (seller_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS orders (
    id INT NOT NULL AUTO_INCREMENT,
    buyer_id INT NOT NULL,
    product_id INT NOT NULL,
    seller_id INT NOT NULL,
    delivery_id INT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    address TEXT NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'PENDING',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY product_id (product_id),
    KEY buyer_id (buyer_id),
    KEY seller_id (seller_id),
    KEY delivery_id (delivery_id),
    CONSTRAINT orders_ibfk_1 FOREIGN KEY (product_id) REFERENCES products(id),
    CONSTRAINT orders_ibfk_2 FOREIGN KEY (buyer_id) REFERENCES users(id),
    CONSTRAINT orders_ibfk_3 FOREIGN KEY (seller_id) REFERENCES users(id),
    CONSTRAINT orders_ibfk_4 FOREIGN KEY (delivery_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
