CREATE TABLE posts (
    id INT NOT NULL,
    title VARCHAR(50),
    content VARCHAR(2000)
);
-- OK

ALTER TABLE posts
ADD PRIMARY KEY (id);
-- OK

ALTER TABLE posts
MODIFY id INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
-- OK

INSERT INTO posts VALUES
(0, 'blabla', 'csijncdpcqj,m'),
(0, '56', 'jdcspjp'),
(0, 'ok', 'nlqndcpm,q');
-- OK