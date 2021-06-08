CREATE DATABASE garciape;	
USE garciape;
CREATE TABLE mercancia (
codigo INT NOT NULL AUTO_INCREMENT,
tipo VARCHAR(25) NOT NULL,
marca VARCHAR(25) NOT NULL,
modelo VARCHAR(25) NOT NULL,
descripcion VARCHAR(50) NOT NULL,
cantidad INT NOT NULL,
costo_unitario INT NOT NULL,
precio_unitario INT NOT NULL,
estatus VARCHAR(25) NOT NULL,
PRIMARY KEY(codigo)
);

CREATE TABLE usuarios (
id_usr INT NOT NULL AUTO_INCREMENT,
usuario varchar(15) NOT NULL,
contrasena varchar(50) NOT NULL,
PRIMARY KEY(id_usr)
);

INSERT INTO mercancia (tipo, marca, modelo, descripcion, cantidad, costo_unitario, precio_unitario, estatus)
VALUES('funda', 'huawei', 'p30 lite', 'original azul con pop', '2', '25.00', '220.00', 'stock'),
	('funda', 'huawei', 'p20 lite', 'original roja', '3', '25.00', '210.00', 'stock'),
	('funda', 'samsung', 'a02', 'roja con estampado', '1', '30.00', '240.00', 'stock'),
	('pop', 'cualquiera', 'cualquiera', 'aguacate', '4', '30.00', '80.00', 'stock'),
	('funda', 'samsung', 'a71', 'uso rudo verde ', '2', '30.00', '220.00', 'stock'),
	('funda', 'samsung', 'a20s', 'estampado flores', '4', '25.00', '250.00', 'stock'),
	('funda', 'iphone', 'xr', 'otterbox', '2', '30.00', '300.00', 'stock'),
	('funda', 'iphone', 'x/xs', 'original azul', '2', '20.00', '200.00', 'stock'),
	('funda', 'iphone', '8 plus', 'original amarillo', '2', '20.00', '200.00', 'stock')