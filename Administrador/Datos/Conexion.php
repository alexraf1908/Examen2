<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author Alex
 */
class Conexion {
       
            var $servidor; //servidor donde se encuentra la base de datos
            var $usuario; //nombre de usuario de la base de datos
            var $password; //password de la base de datos 
            var $bd; //nombre de la base de datos a la que quieres acceder
            //////////////////////////////////////////////////////////////////////////
            var $consulta; //aquí se guarda las consultas que se realizan
            var $enlace; //aquí se almacena la conexión con la bd, sí se ha producido
            var $resultado; //aquí se guardan los datos que se generen de una consulta
             
            //constructor, donde se inicializan las variables
             
            function __construct() {
                
                  $this->servidor = "localhost";
                  $this->usuario = "root";
                  $this->password = "1234";
                  $this->bd = "transporte";
                  $this->conectar();
             
            }

            //conectamos con la base de datos
            function conectar() {
                  //se realiza la conexión a la base de datos
            
                
                  if($this->enlace=mysqli_connect($this->servidor,$this->usuario,$this->password)) {
                        //se intenta acceder a la base de datos que deseeamos
                      
                       // mysqli_select_db($link, $dbname);
                     
                      
                        if(mysqli_select_db($this->enlace,$this->bd)) {
                              //Sí es correcta muestra mensaje (sí quieres lo quitas, sólo sirve para ver si funciona).
                              return true;
                        } else {
                              //Si falla muestra el mensaje que el error está al acceder a la base de datos
                              echo "No se ha podido seleccionar la  BD";
                        }
                  } else {
                        //Si falla la conexión con la base de datos se muestra el mensaje
                        echo "No se ha podido conectar a la bd";
                  }                 
            }
             
            //function consultas a la bd
            function consultar($query) {
                  //aquí se realizan las consultas a la base de datos
               
                
                  $sql = $this->consulta=mysqli_query($this->enlace,$query);
                  return $sql;
            }
             
            //obtener resultados de la consulta
            function obtener_consulta() {
                  //aquí se obtienen los datos de la consulta
                  $this->resultado=mysqli_fetch_array($this->consulta);

                 return $this->resultado;           
                     
                  
            }
             
            //cerramos la conexión con la base de datos
            function desconectar() {
                  mysqli_close($this->enlace);
            }
}

?>
