##########################################
CREATE TABLE total_points(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,	
	FK_studentId int NOT NULL,
	task1 int,
	task2 int,
	task3 int,
	task4 int,
	task5 int,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (FK_studentId) REFERENCES users(studentId) ON DELETE CASCADE
);
##########################################