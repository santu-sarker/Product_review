# product_review
This is a simple demo website for reviewing various product

*****************************************************************
Database name in phpmyadmin : product_review

table : master_users

create table if not exists master_user(
	user_id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_name VARCHAR(50) NOT NULL ,
    user_email varchar(50) NOT NULL UNIQUE,
    user_password VARCHAR(50) NOT NULL ,
    user_gender VARCHAR(10) NOT NULL ,
    user_type VARCHAR(10) NOT NULL ,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
