
IF NOT EXISTS(SELECT * FROM sys.databases WHERE name = 'nice')
BEGIN
CREATE DATABASE [nice]


END
GO
    USE [nice]
GO

IF NOT EXISTS (SELECT * FROM sysobjects WHERE name=' users')
BEGIN
    CREATE TABLE  users (
         user_Id INT PRIMARY KEY AUTO_INCREMENT,
         user_Email VARCHAR(100),
         user_Password VARCHAR(100)
    )
END

IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='products')
BEGIN
    CREATE TABLE products (
        product_id INT PRIMARY KEY AUTO_INCREMENT,
        download_file_link VARCHAR(100),
        product_name VARCHAR(100)
    )
END

IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='tokens')
BEGIN
    CREATE TABLE tokens (
        product_id INT PRIMARY KEY AUTO_INCREMENT,
        remember_me_token VARCHAR(100)
    )
END

IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='orders')
BEGIN
    CREATE TABLE orders (
        order_id INT PRIMARY KEY AUTO_INCREMENT,
        oredr_date VARCHAR(100)
    )
END
