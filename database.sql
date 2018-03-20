DROP DATABASE IF EXISTS gExpress;
CREATE DATABASE gExpress;
CREATE TABLE products(
  idNum INT NOT NULL AUTO_INCREMENT,
  pName VARCHAR(255),
  pType VARCHAR(255),
  pCategory VARCHAR(255),
  pCalories INT,
  pPrice INT,
  img VARCHAR(255),
  PRIMARY KEY (idNum)
);

CREATE TABLE customer(
  cID INT NOT NULL AUTO_INCREMENT,
  fName VARCHAR(255) NOT NULL,
  lName VARCHAR(255) NOT NULL,
  fleetID VARCHAR(10) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  img VARCHAR(255),
  PRIMARY KEY (cID)
);

CREATE TABLE orders(
  orderNum INT NOT NULL AUTO_INCREMENT,
  cID INT,
  idNum INT,
  orderDate TIMESTAMP,
  quantity INT,
  saleprice INT,
  PRIMARY KEY (orderNum, orderDate, cID),
  FOREIGN KEY (idNum) REFERENCES products(idNum)
);

CREATE TABLE Billed(
  BillNum INT NOT NULL AUTO_INCREMENT,
  orderDate TIMESTAMP,
  cID INT,
  price INT,
  PRIMARY KEY (BillNum, orderDate, cID),
  FOREIGN KEY (cID) REFERENCES customer(cID)
);


INSERT INTO customer(fName, lName, fleetID, username, password, img)
VALUES('Richard', 'Zhou', 'XXXXXXXXXX', 'admin','admin', 'image/rich3.jpg'),
('Spock', 'McSpockFace', 'CGDFSGFG10', 'user', 'user', 'image/spock.jpg');

INSERT INTO products(pName,pType,pCategory,pCalories,pPrice,img)
VALUES('Takoyaki', 'Japanese', 'Appetizers', 800, 600, 'image/takoyaki.jpg'),
('Spring Rolls', 'Chinese', 'Appetizers', 500, 300, 'image/rolls.jpg'),
('Potato Skins', 'Western', 'Appetizers', 800, 600, 'image/potato.jpg'),
('Calamari', 'Greek', 'Appetizers', 690, 800, 'image/squid.jpg'),
('Fish Tacos', 'Mexican', 'Appetizers', 700, 700, 'image/taco.jpg'),
('Garlic Wings', 'Cambodian', 'Appetizers', 1023, 800, 'image/wings.jpg'),
('Jalapeno Poppers', 'Western', 'Appetizers', 656, 550, 'image/poppers.jpg'),
('Pork Sliders', 'Western', 'Appetizers', 899, 650, 'image/sliders.jpg'),
('Cream of Broccoli', 'Western', 'Soups', 323, 450, 'image/broccoli.jpg'),
('Clam Chowder', 'Western', 'Soups', 300, 450, 'image/clam.jpg'),
('Hot & Sour', 'Chinese', 'Soups', 300, 450, 'image/hot.jpg'),
('Shark Fin Soup', 'Chinese', 'Soups', 300, 800, 'image/shark.jpg'),
('Lasagna', 'Italian', 'Carbs', 1200, 1025, 'image/lasagna.jpg'),
('Spaghetti', 'Italian', 'Carbs', 1200, 966, 'image/spaghetti.jpg'),
('Pizza', 'Italian', 'Carbs', 1200, 1125, 'image/pizza.jpg'),
('Polenta', 'Italian', 'Carbs', 900, 825, 'image/polenta.jpg'),
('Fried Rice', 'Chinese', 'Carbs', 800, 1025, 'image/rice.jpg'),
('Chow Mein', 'Chinese', 'Carbs', 900, 1025, 'image/mein.jpg'),
('BBQ Ribs', 'Western', 'Entrees', 1500, 2305, 'image/ribs.png'),
('Filet Mignon', 'Western', 'Entrees', 1300, 2500, 'image/filet.jpg'),
('Roast Chicken', 'Western', 'Entrees', 1500, 1505, 'image/chick.jpg'),
('Smoked Salmon', 'Western', 'Entrees', 1500, 1805, 'image/salmon.jpg'),
('Ma Po Tofu', 'Chinese', 'Entrees', 800, 1305, 'image/tofu.jpg'),
('Kung Pao Chicken', 'Chinese', 'Entrees', 1340, 1505, 'image/kpc.jpg'),
('Tonkatsu', 'Japanese', 'Entrees', 1800, 1605, 'image/tonk.jpg'),
('Okonomiyaki', 'Japanese', 'Entrees', 1800, 1800, 'image/oko.jpg'),
('Butter Chicken', 'Indian', 'Entrees', 1800, 1800, 'image/butChick.jpg'),
('Caesar Salad', 'Western', 'Sides', 100, 550, 'image/salad.jpg'),
('Grilled Asaparagus', 'Western', 'Sides', 100, 600, 'image/aspar.jpg'),
('Cole Slaw', 'Western', 'Sides', 100, 550, 'image/slaw.jpg'),
('Green Beans', 'Chinese', 'Sides', 100, 700, 'image/beans.jpg'),
('Coca Cola', 'Western', 'Beverages', 140 , 100, 'image/coke.jpg'),
('Dr.Pepper', 'Western', 'Beverages', 140 , 100, 'image/dp.png'),
('Perrier', 'French', 'Beverages', 140 , 100, 'image/perrier.jpg');

INSERT INTO orders
VALUES();

INSERT INTO ordered
VALUES()