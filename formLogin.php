
<?php
    //inicia la session
session_start();
//destruye todas las variciones de las sessiones
session_unset();
//Finalmente destruye la session
session_destroy();

 ?> 
<?php


?>

<style type="text/css">

*{

    font-size: 14px;

}

body{

background:#aaa;

}

form.login {

    background: none repeat scroll 0 0 #F1F1F1;

    border: 1px solid #DDDDDD;

    font-family: sans-serif;

    margin: 0 auto;

    padding: 20px;

    width: 278px;

    box-shadow:0px 0px 20px black;

    border-radius:10px;
    



}

form.login div {

    margin-bottom: 15px;

    overflow: hidden;

}

form.login div label {

    display: block;

    float: left;

    line-height: 25px;

}

form.login div input[type="text"], form.login div input[type="password"] {

    border: 1px solid #DCDCDC;

    float: right;

    padding: 4px;

}

form.login div input[type="submit"] {

    background: none repeat scroll 0 0 #DEDEDE;

    border: 1px solid #C6C6C6;

    float: right;

    font-weight: bold;

    padding: 4px 20px;

}

.error{

    color: red;

    font-weight: bold;

    margin: 10px;

    text-align: center;

}

</style>

<br><br>


<form action="Administrador/Negocio/usuario/valida.php" method="post" class="login">
    
    <center><img src="Administrador/Vista/Imagenes/sesion.jpg" width="204" height="204" alt="sesion"/></center>
    <p>
    <div><label>Username</label><input name="t1" type="text" ></div>

    <div><label>Password</label><input name="t2" type="password"></div>

    <div><input name="login" type="submit" value="login"></div>
    <a href="index.php">Atras</a>
</form>

<?php
if (isset($_GET["iderror"]))
{
 if ($_GET["iderror"]==1){echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';}
}

if (isset($_GET["iderror"]))
{
    if ($_GET["iderror"]==2){
    ?> 
<script> alert('Debe identificarse Primero para ingresar a la pagina');</script>   
    <?php
}





    }
 ?> 