CREATE DATABASE IF NOT EXISTS school_portal
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE school_portal;

CREATE TABLE IF NOT EXISTS students (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(120) NOT NULL,
  score TINYINT UNSIGNED NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT chk_score CHECK (score BETWEEN 0 AND 100)
);

INSERT INTO students (full_name, score) VALUES
('Alex Morgan', 87),
('Sam Taylor', 64),
('Jordan Lee', 42);
