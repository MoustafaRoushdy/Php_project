
CREATE database nice ; 
 use nice; 

    CREATE TABLE  users (
         user_Id INT PRIMARY KEY AUTO_INCREMENT ,
         user_Email VARCHAR(100) NOT NULL,
         user_Password VARCHAR(100) NOT NULL
        );


    CREATE TABLE products (
        product_id INT PRIMARY KEY AUTO_INCREMENT,
        download_file_link VARCHAR(100) NOT NULL,
        product_name VARCHAR(100) NOT NULL
        );

    CREATE TABLE tokens (
        product_id INT PRIMARY KEY AUTO_INCREMENT,
        remember_me_token VARCHAR(100) NOT NULL
    );


    CREATE TABLE orders (
        order_id INT PRIMARY KEY AUTO_INCREMENT,
        oredr_date VARCHAR(100) NOT NULL
    );

