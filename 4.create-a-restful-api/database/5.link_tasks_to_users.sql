ALTER TABLE task
ADD user_id INT NOT NULL,
ADD INDEX (user_id);

ALTER TABLE task
ADD FOREIGN KEY (user_id) REFERENCES user(id)
ON DELETE CASCADE ON UPDATE CASCADE;
