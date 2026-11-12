# Asegúrate de agregar 'flash' a las importaciones
from flask import Flask, redirect, render_template, request, url_for, flash
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True

# CONEXION A MYSQL
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'crud_papeleria'

app.secret_key = 'mysecretkey'

# Inicializar la conexion
mysql = MySQL(app)

# RUTA PRINCIPAL: READ
@app.route('/')
def index():
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_papeleria')
    conPapeleria = con.fetchall()
    print(conPapeleria)
    return render_template('index.html', listPapeleria= conPapeleria)

# RUTA EDITAR 
@app.route('/editar/<int:id>')
def editar(id):
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_papeleria WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('editarPapeleria.html', Papeleria=consultarId)


@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    if request.method == 'POST':
        nombre = request.form['txtNombre']
        descripcion = request.form['txtDescripcion']
        costo = request.form['txtCosto']
        stock = request.form['txtStock']
        
        con = mysql.connection.cursor()
        
        con.execute('UPDATE tb_papeleria SET nombre=%s, descripcion=%s, costo=%s, stock=%s WHERE id=%s', (nombre, descripcion, costo, stock, id))
        mysql.connection.commit()
        
        flash('Se actualizó el producto: ' + nombre)
        return redirect(url_for('index'))

# RUTA ELIMINAR 
@app.route('/eliminar/<int:id>', methods=['POST'])
def eliminar(id):
    if request.method == 'POST':
        nombre = request.form['txtNombre']
        
        con = mysql.connection.cursor()
        con.execute('DELETE FROM tb_papeleria WHERE id=%s', (id,))
        mysql.connection.commit()
        
        flash('Se eliminó el producto: ' + nombre)
        return redirect(url_for('index'))

# RUTA GUARDAR
@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        nombre = request.form['txtNombre']
        descripcion = request.form['txtDescripcion']
        costo = request.form['txtCosto']
        stock = request.form['txtStock']
        
        print(nombre, descripcion, costo, stock)
        """ CONEXION CON LA BD Y EJECUCION DEL INSERT """
        con = mysql.connection.cursor()
        con.execute('INSERT INTO tb_papeleria(nombre, descripcion, costo, stock) VALUES(%s,%s,%s,%s)', (nombre, descripcion, costo, stock))
        mysql.connection.commit()
        
        flash('El producto se agrego correctamente')
        return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)