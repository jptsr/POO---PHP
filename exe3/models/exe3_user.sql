CREATE TABLE exe3_user (
    id INT NOT NULL,
    username VARCHAR(50),
    email VARCHAR(320),
    password VARCHAR(50),
    connected TINYINT
);
-- OK

ALTER TABLE exe3_user
ADD PRIMARY KEY (id);
-- OK

ALTER TABLE exe3_user
MODIFY connected TINYINT(1);
-- OK

ALTER TABLE exe3_user
MODIFY id INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
-- OK