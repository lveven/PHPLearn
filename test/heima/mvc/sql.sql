use homestead;
show tables;

select * from usertable;

INSERT INTO `usertable` VALUES (NULL, '小图', '大学', '弹琴', '山东', '2017-12-28 16:10:38', 18);

CREATE TABLE IF NOT EXISTS product(
pro_id int(11) PRIMARY KEY AUTO_INCREMENT,
pro_name VARCHAR(100),
protype_id INT(11),
price DECIMAL(10,2),
pinpai VARCHAR(25),
chandi VARCHAR(25) 
);

INSERT INTO product(pro_name,protype_id,price,pinpai,chandi)VALUES('康佳（KONKA）42英寸全高清液晶电视',1,1999.00,'康佳','深圳');

INSERT INTO product(pro_name,protype_id,price,pinpai,chandi)VALUES('索尼（SONY）60英寸全高清液晶电视',1,1999.00,'索尼','深圳');

INSERT INTO product(pro_name,protype_id,price,pinpai,chandi)VALUES('索尼（SONY）40英寸全高清液晶电视',1,1999.00,'索尼','深圳');

INSERT INTO product(pro_name,protype_id,price,pinpai,chandi)VALUES('索尼（SONY）4G手机',1,1999.00,'索尼','青岛');

CREATE TABLE IF NOT EXISTS product_type(
protype_id INT(11) PRIMARY KEY AUTO_INCREMENT,
protype_name VARCHAR(50)
);

INSERT INTO product_type(protype_name)VALUES('家用电器');
INSERT INTO product_type(protype_name)VALUES('手机数码');
INSERT INTO product_type(protype_name)VALUES('电脑办公');

SELECT * FROM product_type;


SELECT * FROM product;
UPDATE product SET protype_id=2 where pro_id = 4;

SELECT * FROM product AS p INNER JOIN product_type AS t ON p.protype_id = t.protype_id;

SELECT p.*,t.protype_name FROM product AS p INNER JOIN product_type AS t ON p.protype_id = t.protype_id;
