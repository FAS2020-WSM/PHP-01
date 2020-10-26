<?php

class InsertarDatosDelEmpleado{

    //propiedades de la clase
    private $nombre;
    private $tarjetaCredito;

//constructor el cual recibirá el valor de los parametros al crear el objeto
    public function __construct($nombre) {
        
        //al crear el objeto se hará un trigger del construct y se iniciará todo
        //automaticamente dentro de el
        echo '<p><h3> INICIANDO CONEXION A BD... </h3></p>';

         //se apunta a la variable tipo el cual recibirá el valor de los parametros a la hora de crear
        $this->nombre = $nombre;
    }

    private function getNumeroTarjeta(){
        $this->tarjetaCredito['numero'];
    }

    // metodo magico __get el cual tiene que recibir como parametro el nombre de la variable a acceder.
    public function __get($propiedad)
    {

        //property_exists comprueba si el objeto o la clase tienen una propiedad
        //Esta función comprueba si la propiedad dada por property existe en la clase especificada.
        //devuelve TRUE incluso si la propiedad de la clase tiene el valor NULL
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    //metodo magico __set que sirve ya sea para cambiar el valor de una propiedad
    //que no es accesible afuera de la clase o crear una nueva propiedad adentro de la clase
    //se tiene que pasar por medio del argumento del metodo,
    //la propiedad a acceder y el valor nuevo

    public function __set($propiedad, $valor)
    {
        return $this->$propiedad = $valor;
    }

    //con el metodo magico isset se conoce si las propiedades o arreglos no accesibles de la clase existen
    //tiene que pasar por parametro el nombre de la propiedad a conocer su existencia
    public function __isset($propiedad)
    {
        return isset($this->$propiedad);
    }

    //con el metodo magico unset se elimina una propiedad o array no accesible de la clase
    //tiene que pasar por parametro el nombre de la propiedad a eliminar de la clase
    public function __unset($propiedad)
    {
        unset($this->$propiedad);
    }

    //El método ___toString()_ permite devolver el objeto representado en forma de string.
    public function __toString()
    {
        return $this->nombre;
    }

    //se lanza cuando el objeto de una clase está por serializarse, no acepta ningun parametro
    //se tiene que retornar un arreglo con las propiedades de las clases a serializar
    //serialize o serializar sirve para el manejo de objetos o arreglos de estructuras de datos
    // complejas (.json por ejemplo) los cuales no se pueden transportar o almacenar o de alguna otra manera
    //ser usado afuera de un script php. Se usa si necesitas mandar informacion afuera de los scripts de php
    //y guardar su tipo y estructura sin ser alterada en el proceso.
    public function __sleep()
    {
        echo 'procediendo a serializar...';
        return array('nombre'); //se serializa la variable nombre

    }

    //se manda a llamar automaticamente cuando un dato se deserializa con la funcion unserialize.
    //hace lo inverso a __sleep
    public function __wakeup()
    {
        echo 'procediendo a deserializar...';
        $this->nombre = 'Juan Perez'; 
    }
    //sirve para acceder metodos no accesibles publicamente y se tiene que retornar
    //con la funcion call_user_func_array un array con la clase que se quiere acceder y el nombre del metodo
    //y finalmente un argumento con los valores de ese array
    
    public function __call($metodo, $valores)
    {
        echo '<p>accediendo automaticamente desde afuera de la clase al metodo privado getNumeroTarjeta</p>';
        return call_user_func_array(array($this, $metodo), $valores);
    }

    //se llama automaticamente y se destruye toda referencia del objeto al finalizar su utilizacion
    public function __destruct()
    {
        echo '<p><h3> CERRANDO CONEXION A BD... </h3></p>';
    }
}

//se crea el objeto y al terminar todo los procesos asignados adentro de la instancia, se destruye
//el cual liberará memoria utilizada
$empleado = new InsertarDatosDelEmpleado('Juan');

//intentando acceder a las variables privadas de la clase desde el objeto creado
echo '<p>Nombre: '.$empleado->nombre . '</p>';

//Cambiandole el valor a nombre por medio del metodo __set()
$empleado->nombre = 'Juanito';
//imprimiendo el nuevo valor de nombre
echo '<p>Nuevo nombre: '.$empleado->nombre . '</p>';

//creando una nueva propiedad en la clase de tipo privado con el metodo magico __set()
$empleado->edad = 25;

//imprimiendo la nueva propiedad creada
echo '<p> Edad: ' . $empleado->edad . '</p>';
//Imprimir el objeto empleado:
echo '<p><h3> Conociendo si la propiedad edad se creó exitosamente dentro de la clase</h3> </p>';
echo var_dump($empleado);

echo '<br>';

//devolverá true si la variable no accesible de la clase existe, en otro caso devolverá false
echo '<p><h3> Conociendo si la propiedad nombre existe adentro de la clase InsertarDatosDelEmpleado</h3> </p>';
echo var_dump(isset($empleado->nombre));

echo '<br>';

//Eliminando la propiedad edad de la clase InsertarDatosDelEmpleado.. </p>';
unset($empleado->edad);

echo '<p><h3> Conociendo si la propiedad edad se eliminó de la clase InsertarDatosDelEmpleado..</h3> </p>';
var_dump($empleado);

//imprimiendo en forma string los valores del objeto empleado
echo '<p><h3> Imprimiendo en forma string los valores del objeto empleado de la clase InsertarDatosDelEmpleado.. </h3></p>';
echo '<p>'. $empleado . '</p>';

//propiedad a serializar
$datoSerializado = serialize($empleado);

echo '<p><h3> Imprimiendo la cadena de datos serializados de la clase InsertarDatosDelEmpleado.. </h3></p>';
//imprime  tipo de dato: (s: string, i: integer, b: boolean, d: double o float, N: null), el numero de
//caracteres del dato: y finalmente el valor del dato
echo '<p>'. $datoSerializado . '</p>';

echo '<p><h3> Imprimiendo la informacion deserializada de la clase InsertarDatosDelEmpleado.. </h3></p>';
echo '<p> DESERIALIZACION CON NUEVA INFORMACION: ' . unserialize($datoSerializado) . '</p>';

$empleado->tarjetaCredito = 123456789;
$empleado->getNumeroTarjeta();
echo '<p> Tarjeta: ' .$empleado->tarjetaCredito .'</p>';
