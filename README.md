# Final_Project
Proyecto final del grado de DAM 2023/2024 de Emilio José Monsálvez Martínez.

Para poder acceder al proyecto completo, he instalado el software de XAMPP, el cuál me permite la gestión de la base de datos MySQL para el acceso de los usuarios y el servidor web Apache, para así poder utilizar php en el backend. Para poder acceder al proyecto, hay que colocar la carpeta con el proyecto en la carpeta htdocs y darle start en la base de datos y en Apache.

La programación del proyecto la estoy realizando con VisualStudio Code, distribuyendo por un lado la carpeta de la página principal, luego una carpeta de las carpetas de registro e inicio de sesión, otra para las páginas a las que accedemos, una carpeta con la plataforma cuando se quiera acceder y, por último, una carpeta con archivos .php para el acceso de los usuarios.

El actual proyecto presenta una página de inicio que permite Iniciar sesión o Registrarse. Una vez registrado, debes iniciar sesión y puedes acceder a la plataforma. La contraseña pasa por una función hash a través de sha512, tanto a la hora de registrarse y guardarse en la base de datos, como a la hora de acceder a la plataforma y comprobar que el usuario se encuentra en la base de datos.

Si no estás logueado e intentas acceder a la plataforma, te saldrá una alerta de que es necesario registrarse.

La plataforma tiene un menú donde puedes acceder al módulo de inicio, el cuál presenta un vídeo de presentación; un módulo de aprendizaje donde aparecen diferentes vídeos con las clases, un módulo de activiades, donde aparecen distintas actividades, las cuáles puedes descargar el pdf y subir un documento en .pdf o .docx que se guardará en la carpeta de uploads con el nombre de usuario delante seguido del nombre de la actividad y un módulo de notas, en el cuál puedes ir anotando lo que necesitas, y cuando lo tengas listo, al darle a descargar, se te descarga un .txt con las anotaciones que has hecho.

Por último, en el perfil, puedes seleccionar la imagen que quieres tener en la sesión, eligiendo entre 3 prototipos, o añadiendo tú tu propia imagen.
