DELIMITER //
DROP PROCEDURE IF EXISTS myProc //
CREATE PROCEDURE myProc()
BEGIN
SELECT * FROM products;
END //

DROP PROCEDURE IF EXISTS thisProc//
CREATE PROCEDURE thisProc (param1 VARCHAR(255))
BEGIN
SELECT * FROM products
WHERE pCategory = param1;
END//

DROP PROCEDURE IF EXISTS item//
CREATE PROCEDURE item (param1 INT)
BEGIN
SELECT * FROM products
WHERE idNum = param1;
END//

DROP PROCEDURE IF EXISTS customer //
CREATE PROCEDURE customer(param1 VARCHAR(10))
BEGIN
SELECT * FROM customer
WHERE cID = param1;
END //

DROP PROCEDURE IF EXISTS ordered //
CREATE PROCEDURE ordered(param1 INT)
BEGIN
SELECT * FROM orders
WHERE cID = param1;
END //

DROP PROCEDURE IF EXISTS billme //
CREATE PROCEDURE billme(param1 INT)
BEGIN
SELECT * FROM Billed
WHERE cID = param1;
END //

CREATE PROCEDURE typeProc
(Param1 VARCHAR(255), Param2 VARCHAR(255))
BEGIN
SELECT * FROM Param1
WHERE pokeType = Param2;
END//
