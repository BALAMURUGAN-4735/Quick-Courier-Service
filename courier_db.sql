CREATE DATABASE courier_db;
USE courier_db;
CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    user_type VARCHAR(20) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE shipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    shipment_id VARCHAR(50) NOT NULL UNIQUE,
    sender_name VARCHAR(100) NOT NULL,
    sender_mobile VARCHAR(15) NOT NULL,
    sender_address TEXT NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    receiver_mobile VARCHAR(15) NOT NULL,
    receiver_address TEXT NOT NULL,
    receiver_pincode VARCHAR(6) NOT NULL,
    parcel_type VARCHAR(50) NOT NULL,
    weight DECIMAL(10, 2) NOT NULL,
    distance_km DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE billing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bill_id VARCHAR(50) NOT NULL UNIQUE,
    shipment_id VARCHAR(50) NOT NULL,
    sender_address TEXT NOT NULL,
    receiver_address TEXT NOT NULL,
    distance_km DECIMAL(10, 2) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_status VARCHAR(20) DEFAULT 'Pending',
    billing_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (shipment_id) REFERENCES shipments(shipment_id)
);
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);