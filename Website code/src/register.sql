CREATE TABLE register (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255),
    username_to_check VARCHAR(255) NOT NULL,
    followers INT NOT NULL,
    following INT NOT NULL,
    profile_pic_option VARCHAR(50) NOT NULL,
    bio_options TEXT NOT NULL,
    result VARCHAR(10) NOT NULL
);