
# Importamos las librerías de Flask
from flask import Flask, render_template, redirect, request, url_for

# Importar las librerías de MYSQL para Flask
from flask_mysqldb import MySQL

# Importamos la librería para generar un hash y comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

# Creamos la instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Configuración de la conexión
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'flasktiid'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)

# Ruta raíz
@app.route("/")
def home():
    return render_template("login.html")

@app.route("/registro", methods=["GET", "POST"])
def registro():

    if request.method == "POST":
        nombres = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        # Generamos un hash a partir de la contraseña
        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()

        cursor.execute(
            "SELECT id FROM usuarios WHERE correo = %s",
            (correo,)
        )

        if cursor.fetchone():
            cursor.close()
            return render_template("registro.html")

        # Insertar el usuario a la base de datos
        cursor.execute(
            """INSERT INTO usuarios
            (nombre, apellido_p, apellido_m, correo, password_hash, id_rol)
            VALUES (%s, %s, %s, %s, %s, %s)
            """,
            (
                nombres,
                apellido_p,
                apellido_m,
                correo,
                password_hash,
                id_rol
            )
        )

        mysql.connection.commit()
        cursor.close()

        return redirect(url_for("home"))

    return render_template("registro.html")


# Ejecutar la aplicación
if __name__ == "__main__":
    app.run(port=5000, debug=True)
