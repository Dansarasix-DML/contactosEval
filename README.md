Añade el siguiente Virtual Host para probar la aplicación:
```
<VirtualHost contactos.eval:80>
    DocumentRoot "C:/xampp/htdocs/DWES/Ud8/evalContactos/public/"
    ServerName contactos.eval
    <Directory C:/xampp/htdocs/DWES/Ud8/evalContactos/>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Y la siguiente línea a tus hosts: ``127.0.0.1 contactos.eval``

Para iniciar sesión usa las siguientes credenciales:
- Usuario: Admin
- Contraseña: admin
