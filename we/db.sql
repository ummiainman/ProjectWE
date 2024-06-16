-- Create the database
CREATE DATABASE FKParkDB;

-- Use the database
USE FKParkDB;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Student', 'Staff', 'Administrator') NOT NULL
);

CREATE TABLE Vehicles (
    vehicle_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    vehicle_type ENUM('car', 'motorcycle') NOT NULL,
    vehicle_number VARCHAR(20) UNIQUE NOT NULL,
    vehicle_grant BLOB NOT NULL,
    qr_code VARCHAR(255),
    approval_status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE UserProfiles (
    profile_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    address VARCHAR(255),
    phone_number VARCHAR(20),
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
