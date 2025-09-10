CREATE DATABASE testdb;
USE testdb;

CREATE TABLE person (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50),
  alamat VARCHAR(100)
);

CREATE TABLE hobi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  person_id INT,
  hobi VARCHAR(50),
  FOREIGN KEY (person_id) REFERENCES person(id)
);