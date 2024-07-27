Me gustaria crear una aplicación donde pueda organizar los almuerzos y cenas de la semana con mi novia.
Para el estilo de la aplicación, se debe aplicar un estilo moderno, con un fondo de pantalla de comidas aesthetic.
Usar solo HTML, la librería de CSS Bulma y Vainilla JavaScript.
Agregar un archivo de log para registro de errores.
Deben estar todos los archivos separados.

Deberíá constar de una pantalla que en forma de lista muestre los días de la semana y dentro de cada día, las opciones de almuerzo y cena como se muestra a continuación:

Lunes
Almuerzo: (formato de campo: text input)
Cena: (formato de campo: text input)

Martes
Almuerzo: (formato de campo: text input)
Cena: (formato de campo: text input)

Miércoles
Almuerzo: (formato de campo: text input)
Cena: (formato de campo: text input)

Jueves
Almuerzo: (formato de campo: text input)
Cena: (formato de campo: text input)

Viernes
Almuerzo: (formato de campo: text input)
Cena: (formato de campo: text input)

No se debe tomar en cuenta sábados y domingos

Una vez cargadas todas las opciones al final agregar un botón que deberá enviar por correo electronico el formulario a los sigientes correos: lucas.castillo@gmail.com y lucas.castillo@invera.com.ar

El asunto del mail debe decir "esta es la planificación de la comida semanal"
En el cuerpo del mail, debe estar listado el contenido del formulario.

Para enviar el correo, se debe utilizar un servicio de email emailJS, las claves son:
service_id: 'service_zh0ogjh',
template_id: 'template_oe1o3vo',
user_id: 'PPZajLlbb_E_2i_Gk',

Explicar como debe configurarse también el contenido del mail en el panel de emailjs.



modificar los archivos actuales para que los datos se puedan guardar en una base de datos llamada meal_planner, cuya tabla se llama weekly_plans y contiene las siguientes columnas:

id
lunes_almuerzo
lunes_cena
martes_almuerzo
martes_cena
miercoles_almuerzo
miercoles_cena
jueves_almuerzo
jueves_cena
viernes_almuerzo
viernes_cena
created_at

el usuario y contraseña de la base de datos es root root y esta creada en mi entorno local


Infinity Free
contraseña 9HiF8jHuRJqHZsj


db name comidassemanales
db user if0_36943803
db pass 