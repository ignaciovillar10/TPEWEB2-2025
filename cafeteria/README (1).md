# TPEWEB2-2025

## Integrantes:
- Ignacio Villar: ignaciovillaar@gmail.com
- Felipe Flores Freije: felipefloresfreije@gmail.com 

## Temática
La temática de nuestro TPE es de una cafetería.

### Descripción
TPE 
parte 1
Tenemos las tablas principales que son las de productos donde irán los productos del negocio, el cual cada uno tiene su nombre, stock, descripción y precio además de su identificador único. Luego encontramos la tabla de pedido que necesita el id-producto para registrar el pedido, también cada pedido tiene estado (si es en preparación o entregado), el total del pedido, su fecha, la preparación (si es para consumir en el local o para llevar), si es para consumir identificamos la mesa de pedido (y en un futuro el id-usuario). Por último, tenemos la tabla de usuarios donde se irán identificando y filtrando según su rol si son clientes o administradores.
parte 2: se modifico la base eliminando la tabla pedidos ya que vimos que no era necesario, agragamos la tabla categoria que tiene relacion con la tabla pedidos y por ultimo le dimos uso a la tabla de usuarios 

### Base de datos
Puedes ver la estructura de la base de datos en el siguiente archivo SQL:  
[Ver archivo SQL](cafeteria(11).sql)

### Imagen de la base de datos
![Imagen de la base de datos](tablacafeteria.png)
## Atencion!
para entrar a la parte del "Admin" tenes que ingresar en donde dice INGRESAR el usuario "webadmin" y la contraseña admin 
en esta seccion podras ver lo "exclusivo" para los usuarios logueados, ya sea agregar,eliminar,modificar productos/categorias de los mismos 
## Codigo .htaccess
<IfModule mod_rewrite.c>
	RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} -f [OR]
    RewriteCond %{REQUEST_FILENAME} -d

    RewriteRule \.(?:css|js|jpe?g|gif|png)$ - [L]
    RewriteRule ^(.*)$ router.php?action=$1 [QSA,L]
</IfModule>

