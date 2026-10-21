# Importamos las librerías de Flask
from flask import Flask, render_template, redirect

# Creamos la instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Ruta raíz
@app.route("/")
def home():
    return "Hola Mundo"

# Ruta guardar
@app.route("/guardar")
def guardar():
    return "PRODUCTO AGREGADO CORRECTAMENTE"

# Ruta login
@app.route("/login")
def login():
    return render_template("login.html")

# Ruta logout
@app.route("/logout")
def logout():
    return redirect("/login")

# Ruta index
@app.route("/index")
def index():
    return render_template("index.html")

# Ejecutar la aplicación
if __name__ == "__main__":
    app.run(port=5000, debug=True)