DROP DATABASE IF EXISTS `BD_VENTAS_GOLDEN`;
CREATE DATABASE `BD_VENTAS_GOLDEN`;
USE `BD_VENTAS_GOLDEN`;

CREATE TABLE `TIPO_USUARIO`(
    Id_tipo_usu INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Desc_tipo_usu VARCHAR (50) NOT NULL
);

CREATE TABLE `USUARIO`(
    Id_usu INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Dni_usu INT(8) NOT NULL,
    Nom_usu VARCHAR(50) NOT NULL,
    Ape_usu VARCHAR(50) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Telefono INT(9) NOT NULL,
    Contraseña VARCHAR(50) NOT NULL,
    Estado INT(1) DEFAULT 1,
    Id_tipo_usu INT NOT NULL,
    FOREIGN KEY fk_tipo_usu_id(Id_tipo_usu) REFERENCES `TIPO_USUARIO`(Id_tipo_usu)
);

CREATE TABLE `CLIENTE`(
    Id_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    RUC INT(11) NOT NULL,
    Nom_cli VARCHAR(50) NOT NULL,
    Ape_cli VARCHAR(50) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Telefono VARCHAR(50) NOT NULL,
    Dirección TEXT NOT NULL,
    Estado INT(1) DEFAULT 1,
    Ultima_compra DATE NOT NULL
);

CREATE TABLE `CATEGORIA`(
    Id_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Cod_categoria VARCHAR(50) NOT NULL,
    Nom_cate VARCHAR(50) NOT NULL,
    Estado INT(1) DEFAULT 1	
);

CREATE TABLE `MEDIDA`(
    Id_medida INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Descripcion VARCHAR(3) NOT NULL
);

CREATE TABLE `COLOR`(
    Id_color INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Detalle_color VARCHAR(20) NOT NULL
);

CREATE TABLE `ESTILO`(
    Id_estilo INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Detalle_estilo VARCHAR(20) NOT NULL
);

CREATE TABLE `PRODUCTO`(
    Id_pro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Cod_producto VARCHAR(50) NOT NULL,
    Detalle_pro TEXT NOT NULL,
    Precio_pro DECIMAL(10, 2) NOT NULL,
    Cantidad_pro INT NOT NULL,
    Estado INT(1) DEFAULT 1,	
    Id_cate INT NOT NULL,
    Id_medida INT NOT NULL,
    Id_color INT NOT NULL,
    Id_estilo INT NOT NULL,
    FOREIGN KEY fk_cate_id(Id_cate) REFERENCES `CATEGORIA`(Id_categoria),
    FOREIGN KEY fk_medida_id(Id_medida) REFERENCES `MEDIDA`(Id_medida),
    FOREIGN KEY fk_color_id(Id_color) REFERENCES `COLOR`(Id_color),
    FOREIGN KEY fk_estilo_id(Id_estilo) REFERENCES `ESTILO`(Id_estilo)
);

CREATE TABLE `METODO_PAGO` (
    Id_metodo_pago INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Descripcion_pago VARCHAR(50) NOT NULL
);

CREATE TABLE `VENTA`(
    Id_venta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Codigo_venta VARCHAR(50) NOT NULL,
    Fecha_venta DATE NOT NULL,
    Hora_venta TIME NOT NULL,
    Id_cliente INT NOT NULL,
    Id_empleado INT NOT NULL,
    Id_producto INT NOT NULL,
    FOREIGN KEY (Id_cliente)  REFERENCES `CLIENTE` (Id_cliente),
    FOREIGN KEY (Id_empleado) REFERENCES `USUARIO`(Id_usu),
    FOREIGN KEY (Id_producto) REFERENCES `PRODUCTO`(Id_pro)
);

CREATE TABLE `DETALLE`(
    Id_detalle INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Cantidad INT NOT NULL,
    Precio DECIMAL(10, 2) NOT NULL,
    Total DECIMAL(10, 2) NOT NULL,
    Id_usuario INT NOT NULL,
    Id_producto INT NOT NULL,
    FOREIGN KEY (Id_usuario) REFERENCES `USUARIO` (Id_usu),
    FOREIGN KEY (Id_producto) REFERENCES `PRODUCTO` (Id_pro)
);


CREATE TABLE `PROVEEDOR`(
    Id_prov INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nom_prov VARCHAR(50) NOT NULL,
    Dir_prov VARCHAR(50) NOT NULL,
    Tel_pro VARCHAR(50) NOT NULL,
    Observación_prov VARCHAR(50) NOT NULL
);

CREATE TABLE `ALMACEN`(
    Id_pro INT NOT NULL PRIMARY KEY,
    Fecha DATE NOT NULL,
    Cantidad INT,
    id_prov INT,
    FOREIGN KEY (Id_pro) REFERENCES `PRODUCTO` (Id_pro),
    FOREIGN KEY (Id_prov) REFERENCES `PROVEEDOR` (Id_prov)
);

INSERT INTO `tipo_usuario`(`Id_tipo_usu`, `Desc_tipo_usu`)
VALUES ('1','Administrador');
INSERT INTO `tipo_usuario`(`Id_tipo_usu`, `Desc_tipo_usu`) 
VALUES ('2','Empleado');

INSERT INTO `usuario`(`Id_usu`, `Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`, `Contraseña`,`Estado`, `Id_tipo_usu`) VALUES ('1','20054523','Edwin','Chocca Arango','Edwin@gmail.com','987654321','admin','1','1');

INSERT INTO `usuario`(`Id_usu`, `Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`,`Contraseña`,`Estado`, `Id_tipo_usu`) VALUES ('2','62619781','María Elena','González Flores','Elena@gmail.com','987654321','emp1','1','2');

INSERT INTO `usuario`(`Id_usu`, `Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`,`Contraseña`,`Estado`, `Id_tipo_usu`) VALUES ('3','80550327','Alejandro Tello','Rodríguez Silva','Alejandro@gmail.com','987654321','emp2','1','2');

INSERT INTO `usuario`(`Id_usu`, `Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`,`Contraseña`,`Estado`, `Id_tipo_usu`) VALUES ('4','70585003','Roberto Martínez ','Santos Ruiz','Roberto@gmail.com','987654321','emp3','1','2');

INSERT INTO `usuario`(`Id_usu`, `Dni_usu`, `Nom_Usu`, `Ape_Usu`, `Correo`, `Telefono`,`Contraseña`,`Estado`, `Id_tipo_usu`) VALUES ('5','74606046','Carmen Valeria ','García Pérez','Carmen@gmail.com','987654321','emp4','1','2');


INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('1','2010001749','Diana Valentina','Ramirez Castillo','Diana@gmail.com','987654321','Villa de los Sueños, País de las Maravillas','1','25-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('2','2010103185','Martina Luciana','García Romero','Martina@gmail.com','987654321','Avenida de las Quimeras 456, Ciudad Ilusoria, Región de las Fantasías','1','25-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`,`Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('3','2011209122','Juan Alejandro','Rodríguez Acosta','Juan@gmail.com','987654321','Calle de los Ensueños 789, Pueblo Mágico, Departamento de la Ilusión','1','25-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('4','2011519016','Valeria Renata','Pérez Vargas','Valeria@gmail.com','987654321','Pasaje de las Utopías 101, Metrópolis de Ensueño, Provincia de las Maravillas','1','26-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('5','2012087705','Sebastián Leonardo','Fernández Mendoza','Sebastián@gmail.com','987654321','Plaza de los Deseos 222, Aldea Onírica, Territorio de los Anhelos','1','26-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('6','2014549617','Camila Victoria','López Herrera','Camila@gmail.com','987654321','Carretera de los Sueños 333, Ciudad de Ensueño, Distrito de la Imaginación','1','26-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('7','2016448672','Catalina Julieta','González Ramos','Catalina@gmail.com','987654321','Jirón de las Fantasías 444, Poblado de los Ensueños, Región de los Sueños','1','27-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('8','2022110691','Mateo Esteban','Martínez Miranda','Mateo@gmail.com','987654321','Avenida de los Anhelos 555, Metrópolis de las Maravillas, Estado de la Ilusión','1','27-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('9','2028607300','Isabella Amelia','Sánchez Navarro','Isabella@gmail.com','987654321','Callejón de las Utopías 666, Capital Onírica, Región de las Quimeras','1','27-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('10','2032265405','Lucas Facundo','Ramírez Montes','Lucas@gmail.com','987654321','Pasaje de los Sueños 777, Pueblo Irreal, Departamento Encantado','1','27-11-23');

INSERT INTO `cliente`(`Id_cliente`, `RUC`, `Nom_cli`, `Ape_cli`, `Correo`, `Telefono`,`Dirección`,`Estado`,`Ultima_compra`) VALUES ('11','2036372567','Nicolás Tomás','Torres Salazar','Nicolás@gmail.com','987654321','Avenida de la Ilusión 888, Villa de los Deseos, Departamento de los Ensueños','1','28-11-23');

INSERT INTO `categoria`(`Id_categoria`, `Cod_categoria`,`Nom_cate`,`Estado`) VALUES ('1','CPT-01','PANTS','1');
INSERT INTO `categoria`(`Id_categoria`, `Cod_categoria`,`Nom_cate`,`Estado`) VALUES ('2','CCT-01','JACKET','1');
INSERT INTO `categoria`(`Id_categoria`, `Cod_categoria`,`Nom_cate`,`Estado`) VALUES ('3','CAS-01','SHIRT','1');

INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('1','XS');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('2','S');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('3','M');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('4','L');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('5','XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('6','2XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('7','3XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('8','4XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('9','5XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('10','6XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('11','7XL');
INSERT INTO `medida`(`Id_medida`, `Descripcion`) VALUES ('12','8XL');

INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('1','RED');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('2','BLACK');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('3','WHITE');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('4','ORANGE');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('5','SKY BLUE');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('6','CHARCOAL GRAY');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('7','OLIVE GREEN');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('8','CORAL');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('9','LIGHT BLUE');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('10','MINT GREEN');
INSERT INTO `color` (`Id_color`, `Detalle_color`) VALUES ('11','PEARL GRAY');

INSERT INTO `estilo` (`Id_estilo`, `Detalle_estilo`) VALUES ('1','SPRING');
INSERT INTO `estilo` (`Id_estilo`, `Detalle_estilo`) VALUES ('2','SUMMER');
INSERT INTO `estilo` (`Id_estilo`, `Detalle_estilo`) VALUES ('3','AUTUMN');
INSERT INTO `estilo` (`Id_estilo`, `Detalle_estilo`) VALUES ('4','WINTER');

INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('1','PAGO EFECTIVO TIENDA');
INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('2','TARJETA DE CRÉDITO');
INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('3','TARJETA DÉBITO');
INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('4','TRANSFERENCIA BANCARIA');
INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('5','CHEQUE');
INSERT INTO `metodo_pago` (`Id_metodo_pago`, `Descripcion_pago`) VALUES ('6','FACTURACIÓN RECURRENTE');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`,`Id_color`,`Id_estilo`) VALUES ('1','PRO1','Jeans con estampado','300','150','1','3','1','1','1');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`, `Id_color`,`Id_estilo`) VALUES ('2','PRO2','Jeans sin estampado','240','130','1','4','1','2','1');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`, `Id_color`,`Id_estilo`) VALUES ('3','PRO3','Manga Corta','100','200','1','5','2','3','2');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`, `Id_color`,`Id_estilo`) VALUES ('4','PRO4','Manga Larga','120','180','1','3','2','4','2');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`, `Id_color`,`Id_estilo`) VALUES ('5','PRO5','Con cierre y bolsillos','200','150','1','4','3','5','3');

INSERT INTO `producto`(`Id_pro`,`Cod_producto`, `Detalle_pro`, `Precio_pro`, `Cantidad_pro`,`Estado`, `Id_medida`, `Id_cate`, `Id_color`,`Id_estilo`) VALUES ('6','PRO6','Sin cierre, ni bolsillos','100','205','1','5','3','6','4');


INSERT INTO `venta`(`Id_venta`,`Codigo_venta`, `Fecha_venta`, `Hora_venta`, `Id_cliente`, `Id_empleado`,`Id_producto`) VALUES ('1','VENT01','13-11-23','3:15','1','2','1');

INSERT INTO `venta`(`Id_venta`,`Codigo_venta`, `Fecha_venta`, `Hora_venta`, `Id_cliente`, `Id_empleado`,`Id_producto`) VALUES  ('2','VENT02','13-11-23','3:29','2','3','1');


INSERT INTO `detalle` (`Id_detalle`,`Cantidad`,`Precio`,`Total`,`Id_usuario`,`Id_producto`) VALUES ('1','20','300','600','2','1');

INSERT INTO `detalle` (`Id_detalle`,`Cantidad`,`Precio`,`Total`,`Id_usuario`,`Id_producto`) VALUES ('2','20','400','800','3','1');







