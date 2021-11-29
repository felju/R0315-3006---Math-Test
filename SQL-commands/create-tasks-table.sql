##########################################
CREATE TABLE task1(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,	
	FK_studentId int NOT NULL,
	exercise_number int NOT NULL,
	inserted_value varchar(9),
	evaluation varchar(9),
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (FK_studentId) REFERENCES users(studentId) ON DELETE CASCADE
);
##########################################