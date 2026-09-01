USE ecommerce_db;

-- Run this only if you already imported the older database file.
ALTER TABLE products
    CHANGE COLUMN IF EXISTS produce_name product_name VARCHAR(150) NOT NULL;

ALTER TABLE users
    ADD COLUMN IF NOT EXISTS status VARCHAR(20) NOT NULL DEFAULT 'active';

ALTER TABLE orders
    ADD COLUMN IF NOT EXISTS delivery_id INT NULL AFTER seller_id,
    ADD COLUMN IF NOT EXISTS created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
