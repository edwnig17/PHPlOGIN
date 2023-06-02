CREATE DATABASE facturacion

-- Categorias---------------------
CREATE TABLE categorias(
    categoria_id INT primary key AUTO_INCREMENT,
    categoriaNombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50),
    imagen VARCHAR (1000)
);


-- Clientes-----------------
CREATE TABLE clientes(
    cliente_id INT primary key AUTO_INCREMENT,
    nombre_clientes VARCHAR (50) NOT NULL,
    celular INT (50),
    compania TEXT (50)
);

-- Empleados------------------
CREATE TABLE empleados(
    empleado_id INT primary key AUTO_INCREMENT,
    nombre_empleados VARCHAR (50) NOT NULL,
    celular INT (50),
    direccion TEXT (50),
    imagen VARCHAR (1000)
);

-- Facturas-------------------
CREATE TABLE facturas(
    factura_id INT primary key AUTO_INCREMENT,
    empleado_id INT (20),
    cliente_id INT (20),
    fecha TEXT (80),
    FOREIGN KEY (empleado_id) REFERENCES empleados(empleado_id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);

--Proveedores--------------------
CREATE TABLE proveedores(
    proveedores_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_proveedores VARCHAR (50) NOT NULL,
    telefono_proveedores INT(25) NOT NULL,
    ciudad_proveedores TEXT (20)
);

--Productos------------------
CREATE TABLE productos(
    producto_id INT primary key AUTO_INCREMENT,
    categoria_id INT (20),
    precioUnitario INT (100),
    stock INT (100),
    unidades_pedidas INT (20),
    proveedor_id INT (20),
    nombre_producto TEXT (50),
    descontinuado BOOLEAN
);
ALTER TABLE `productos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`categoria_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `productos` ADD FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores`(`proveedores_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--factura detalle-------------------------
CREATE TABLE factura_detalle(
    factura_detalle_id INT PRIMARY KEY AUTO_INCREMENT,
    producto_id INT (20),
    cantidad INT (20),
    precio_venta INT (100)
);
ALTER TABLE `factura_detalle` ADD FOREIGN KEY (`producto_id`) REFERENCES `productos`(`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--Users login-----------------
CREATE TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    empleado_id INT (20),
    email_user VARCHAR (80) NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (80)  NOT NULL
);
ALTER TABLE `users` ADD FOREIGN KEY (`empleado_id`) REFERENCES `empleados`(`empleado_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;