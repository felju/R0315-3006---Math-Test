##########################################
CREATE TABLE users(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,	
	studentId int NOT NULL UNIQUE,
	firstName varchar(255),    
	lastName varchar(255),
	password VARCHAR(255) NOT NULL,
    teacher boolean default false,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
##########################################