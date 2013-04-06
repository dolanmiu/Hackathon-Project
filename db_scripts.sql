CREATE DATABASE pledgedb 
  COLLATE = latin1_general_ci; 

USE pledgedb;

CREATE TABLE charities (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  name VARCHAR(30) UNIQUE NOT NULL,
  slug_name VARCHAR(30),
  street_address VARCHAR(40),
  post_code VARCHAR(10),
  city VARCHAR(30),
  country VARCHAR(30),
  email VARCHAR(40),
  tel_no VARCHAR(20),
  description VARCHAR(500)
);

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fb_uid BIGINT,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  first_name VARCHAR(30),
  last_name VARCHAR(30),
  email VARCHAR(40),
  age INT,
  gender TINYINT,
  street_address VARCHAR(40),
  post_code VARCHAR(10),
  city VARCHAR(30),
  country VARCHAR(30)
  );

CREATE TABLE charity_admins (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users (id)  ON DELETE CASCADE, 
  charity_id INT,
  FOREIGN KEY (charity_id) REFERENCES charities (id)  ON DELETE CASCADE
);

CREATE TABLE effects (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  charity_id INT,
  FOREIGN KEY (charity_id) REFERENCES charities (id) ON DELETE CASCADE,
  description VARCHAR(500),
  min_amount FLOAT,
  max_amount FLOAT,
  visible TINYINT
);


CREATE TABLE donations (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  charity_id INT,
  FOREIGN KEY (charity_id) REFERENCES charities (id) ON DELETE CASCADE,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
  amount FLOAT,
  start_date TIMESTAMP,
  end_date TIMESTAMP,
  frequency INT
);

CREATE TABLE transactions  (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  amount FLOAT,
  updated_at TIMESTAMP,
  created_at TIMESTAMP,
  donation_id INT,
  FOREIGN KEY (donation_id) REFERENCES donations (id) ON DELETE CASCADE
);