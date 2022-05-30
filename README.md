## Informacion general

1. Version Laravel: 8.*.*
2. Base de datos: MySQL
3. Base URL: http://localhost/gdalab/public
## Iniciar proyecto
1. Instalar dependencias con: composer install
2. Correr migraciones: php artisan migrate
3. Correr los seeders de usuario, regions y communes
	3.1 php artisan db:seed --class=UserSeeder
	3.2 php artisan db:seed --class=RegionSeeder
	3.3 php artisan db:seed --class=CommuneSeeder
4. Se requiere instalar instalar en un servidor local con PHP Version 8.0.11, version de desarrollo no disponible con php artisan serve

## EndPoints

1. Login
	1.1 api/login

	Descripcion: Genera el token del usuario, este token es necesario enviarlo en cada request, el token tine tiempo de vida de 1hr a partir de que es creado.
	Tipo: POST
	Body params
	```json
		{
			"email" : "alejandrotsu23@gmail.com",
			"password" : "123456"
		}
		
	```

	Response
	```json
		{
			"status": true,
			"data": {
			"token": "$2y$10$X3b5mAR0QtYcWMz5bC0lhOYZieHUsNd.UIey1TF8erg8X5ZyUeMuW"
			}
		}
	```


2. Customers
	2.1 api/customers

	Descripcion: Obtiene todos los customers del catalogo de customers, es necesario enviarle por header el token
	obtenido.
	Tipo: GET
	Headers
	```json
		"token" : "",
	```

	Response example
	```json
	{
		"status": true,
		"data": [
					{
						"name": "Manuel Alejandro Chavez Nunez",
						"last_name": "Manuel Alejandro Chavez Nunez",
						"address": null,
						"region": {
							"description": "Michoacan"
						},
						"commune": {
							"description": "Guanajuato CPT"
						}
					}
		]
	}
	```

2. Customer
	2.1 api/customer/{param}

	Descripcion: Obtiene un customer dado segun un parametro, consulta por email o dni
	obtenido. Debe enviarse un token por headers.

	Headers
	```json
		"token" : "",
	```

	Response example
	```json
	{
		"status": true,
		"data": {
				"name": "Manuel Alejandro Chavez Nunez",
				"last_name": "Manuel Alejandro Chavez Nunez",
				"address": null,
				"region": {
					"description": "Michoacan"
				},
				"commune": {
					"description": "Guanajuato CPT"
				}
		}
	}

2. Delete customer
	2.1 api/customer/{param}

	Descripcion: Se hace el borrado logico del customer enviando el dni de un usuario activo
	obtenido. Debe enviarse un token por headers.
	Tipo: DELETE
	Headers
	```json
		"token" : "",
	```

	Responses example
	```json
	{
		"status": true,
		"data": {
			"msg": "Registro eliminado"
		}
	}

	```
	```json
	{
		"status": true,
		"data": {
			"msg": "Registro no existe"
		}
	}
	```




