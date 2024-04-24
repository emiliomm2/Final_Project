# Final_Project
Proyecto final del grado de DAM 2023/2024 de Emilio José Monsálvez Martínez.

Para poder acceder al proyecto completo, he instalado el software de XAMPP, el cuál me permite la gestión de la base de datos MySQL para el acceso de los usuarios y el servidor web Apache, para así poder utilizar php en el backend. Para poder acceder al proyecto, hay que colocar la carpeta con el proyecto en la carpeta htdocs y darle start en la base de datos y en Apache.

La programación del proyecto la estoy realizando con VisualStudio Code, distribuyendo por un lado la carpeta de la página principal, luego una carpeta de las carpetas de registro e inicio de sesión, otra para las páginas a las que accedemos y, por último, una carpeta con archivos .php para el acceso de los usuarios.

El actual proyecto presenta una página de inicio que permite Iniciar sesión o Registrarse. Una vez registrado, debes iniciar sesión y puedes acceder a la plataforma. La contraseña pasa por una función hash a través de sha512, tanto a la hora de registrarse y guardarse en la base de datos, como a la hora de acceder a la plataforma y comprobar que el usuario se encuentra en la base de datos.

Si no estás registrado e intentas acceder a la plataforma, te saldrá una alerta de que es necesario registrarse.
