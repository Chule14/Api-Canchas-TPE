#API de Alquiler de Canchas Sintéticas

##Descripción

Esta API tiene como proposito acceder a un sistema de alquiler de canchas sinteticas. 
La dirección base de la API es la siguiente:

{ruta_servidor_apache}/api
---
##Requerimientos
Contar con la base de datos descripta en el siguiente archivo la cual ya cuenta con datos para que se posible hacer las pruebas.
[Base de Datos](https://github.com/Chule14/Api-Canchas-TPE/blob/master/Alquiler_Canchas.sql)

---
##Endpoints

- GET:/api/Canchas
- este endpoint devuelve todas las canchas cargadas en la base de datos.

- GET:/api/Canchas/:id
- este endpoint devuelve una cancha especifica buscada por su id.

- GET:/api/Canchas/sortedByPrecio
- este endpoint devuelve todas las canchas ordenadas de manera ascendente en cuanto a su valor

- POST:/api/Canchas
- Este endpoint recibe un formData en el body del HTTP Request del siguiente formato:
- /* Los únicos campos necesarios para crear exitosamente una cancha son los que se muestran a continuacion. */
- 
- {
    "tipo_cesped" : "tipo de cesped" (text),
   "imagen": "url_imagen.png", (Tipo File);
    "techada" : "0/1"(boolean),
    "precio" : "valor de un turno" (text)

};

PUT:/api/Canchas/:id
Este endpoint recibe la informacion con la siguiente estructura
{
    "tipo_cesped" : "natural",
    "techada" : "1",
    "precio" : "22000"
}

el mismo, no requiere el campo "imagen"  ya que no se puede modificar.

GET:/api/Turnos
- este endpoint devuelve todos los turnos cargados en la base de datos.

- GET:/api/Turnos/:id
- este endpoint devuelve un turno especifico buscado por su id.

 GET:/api/Turnos/cancha/:id_cancha
este endpoint lista los turnos para una cancha especifica


POST:/api/Turnos
- Este endpoint recibe un formData en el body del HTTP Request del siguiente formato:
- /* Los únicos campos necesarios para crear exitosamente un turno son los que se muestran a continuacion. */
- 
- {
    "cancha" : "id de la cancha a la que pertenece el turno" (text),
    "fecha" : "mm/dd/nnnn"(date),
    "horario" : "hora" (time),
    "estado"  : "estado" (boolean)
};

