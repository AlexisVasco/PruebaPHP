# PruebaPHP

Primer commit
Para inicializar el programa, debemos arrancar Apache y MySQL desde XAMPP. Se utilizo biblioteca mysqli_connect() en la pestaña db.php para conectar con el servidor, el cual se esta utilizando PhpMyAdmin, donde esta la base de datos "php_mysql_prueba" con sus respectivas tablas "product" y "ventas".
El servidor esta en localhost, con el usuario root y contraseña por defecto.
Una vez conectados, se puede iniciar el programa desde nuestro navegador con la direccion http://localhost/php_crud_prueba/, donde mostrara la interfaz inicial con toda su estructura, la cual tiene su codigo en la pestaña index.php.
Esta interfaz nos permite ingresar productor con todos sus atributos, menos la fecha, ya que la base de datos la coloca automaticamente con la fecha actual de cuando se crea el producto.
Se puede ver una tabla que muestra los productos creados, con 3 botones en la ultima columba, que nos permiten editar el producto, eliminar y vender.
El boton editar, nos mueve a otra interfaz, donde solo aparecen los atributos que podemos modificar mas un boton de "actualizar", al realizar los cambios, nos dirige al index nuevamente dandonos un mensaje visible de que el producto se modifico.
El boton eliminar, borra de la tabla y de myadmin, el producto que desee, al mismo tiempo nos da un mensaje diciendo que se borro con exito.
El boton vender, nos direcciona a otra interfaz donde solo aparece el nombre del producto, el cual no se puede modificar, tambien la cantidad que desea vender y un boton "vender" que nos dirige nuevamente al index y resta lacantidad vendida al stock actual.
Con la parte de venta, se tuvo un problema al mostrar la cantidad que se desea vender, el cual con toda mi sinceridad informo que no encontre la falla y por falta de tiempo tuve que dejar de esa forma, de igual manera las demas funciones estan correctas y la base de datos completa con sus respectivas consultas las cuales dejare a continuacion:

Producto con mayor stock existente:
SELECT producto, stock
FROM product
ORDER BY stock DESC
LIMIT 1;

Total cantidad vendido:
SELECT product, SUM(cantidad) AS total_vendido
FROM ventas
GROUP BY producto
ORDER BY total_vendido DESC
LIMIT 1;

Como decia, las consultas estan bien, solo tuve el problema que mencione anteriormente.

En la pestaña "index.php" se utiliza PHP y HTML para darle forma a la interfaz principal, que va contener las demas pestañas funcionales.
En la pestaña "save_product.php" encontramos el codigo con su respectiva operacion para guardar nuevos productos en la interfaz de index.
En la pestaña "edit.php" encontramos el codigo con su respetiva operacion para modificar un producto desde su respectiva interfaz, se utiliza una variable id para reconocer el producto, con redireccionamiento al index cuando se finaliza.
En la pestaña "delete_product.php" encontramos el codigo con su respectiva operacion, utilizando nuevamente la variable id para identificar el producto que se desea eliminar.
En la pestaña "ventas.php" Encontramos el codigo con sus operaciones para realizar las ventas en la interfaz inder, con la cual tuve el problema que aun no encuentro y por tiempo, debo dejarlo asi.
En las pestañas "footer.php" y "header.php" se utiliza BOOTSTRAP 4, FONT AWEAOME 5 y SCRIPT para darle una cabeza a nuestro cuerpo de codigo.

Cabe recalcar que al momento de recibir el correo, no tenia nada del entorno para trabajar, ya que mi equipo esta recien formateado y como no habia trabajado, no tenia nada para realizarlo, lo cual me quito un buen tiempo mientras creaba todo el entorno.
