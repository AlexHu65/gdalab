---
title: gdalab Documentation

language_tabs:
- bash
- javascript

includes:
- "./prepend.md"
- "./authentication.md"
- "./groups/*"
- "./errors.md"
- "./append.md"

logo: 

toc_footers:
- <a href="./collection.json">View Postman collection</a>
- <a href="./openapi.yaml">View OpenAPI (Swagger) spec</a>
- <a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a>

---

# Introduction



Se requiere hacer 3 Servicios Restful donde :
1. Se registren Customers.
2. Se consulten Customer por dni o email.
3. Eliminar lógicamente el customer del sistema.
4. Cada servicio retornará a demás de la información solicitada un success true si se
ejecuto correctamente y si no un false. 

Indicaciones a seguir :
0. Se debe hacer un servicio de autenticación que retorne cuando el inicio de sesión
sea exitoso un token con tiempo de vida (el token no debe repetirse y conformado
de email, fecha y hora del inicio de sesión y un random de 200 a 500 todo encriptado
en SHA1 ), este token deberá ser usado en todos los otros servicios a hacer y
validando que si esta vencido no pueda ser usado y no de acceso al servicio.
(Debe crear las tablas necesarias para que esta función se cumpla.)
1. Al registrar, asociar la commune y region del cliente, hacer todas las validaciones
pertinentes. ejm no permitir registro de customer en commune y regiones que no
estén relacionadas o no existan.
2. La consulta debe hacerse solo con customer activos (A), no con desactivo (I) o
eliminados (trash), adicionalmente deberá retornar name, last_name, address (de
no tener address retorna null en el campo), description region y commune. Realizar
validaciones pertinentes.
3. El customer a eliminar debe de estar activo (A) o desactivo (I). En el caso de estar
ya eliminado (trash) retornar “Registro no existe”. Hacer validaciones pertinentes.
4. El servicio debe de solo poder ser ejecutado en POST (Inserción) DELETE
(Eliminación de registros) GET (Consulta de información).
5. Debe de ser desarrollado en php en el framework Lumen o Laravel (Ultimas
versiones) utilizando todas las herramientas que estas entregan para su correcto
funcionamiento.
6. El código debe de estar protegido para sql Injection y con un key de autenticación
(Debe implementarse a través de middlewares) Toda validación previa (campos
obligatorios, o validaciones de que la información que pasan exista debe hacerse a
través de middlewares).
7. Documentación del servicio para su uso y para el desarrollador (Definición de
servicios, metodos, pasos para su instalación, configuración y requerimientos
mínimos) todo esto en el archivo ReadMe del proyecto.
8. Debe manejar logs de entrada y salida de información (puede estar en BD o en
archivos de texto plano), así mismo, indicar de que IP proviene la información.
9. La plataforma debe tener un parámetro en el .env donde si se pasa a producción
deja de guardar los logs de salida y solo guardar los de entrada.
Este parámetro APP_DEBUG siempre debe estar en False.
10. Al terminar el proyecto se debe de subir a un github publico y copiar el repo y
pasarlo de respuesta en el correo donde te llego este documento.


<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://localhost/gdalab/public";
</script>
<script src="js/tryitout-2.7.10.js"></script>

> Base URL

```yaml
http://localhost/gdalab/public/api
```