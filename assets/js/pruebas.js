
//declarar una variable
var num1;
var num2;
//asignar valores estaticos
/* num1=8;
num2=5.5; */
//asignar valores desde cuadro de dialogo
num1=prompt('Ingrese usuario:','');
num2=prompt('Ingrese clave','');
/*
if(num1==num2){ resu= parseInt(num1) + parseInt(num2); }
else if(num1>num2){ resu=num1-num2; }
//else if(num1!=num2){ resu=num1*num2; }
else if(num2>num1 && num2!=0){ resu=num1/num2; }
else { resu=0; } */

if(num1=="dpweb" && num2=="1234"){
 //document.write("bienvenido");
 location.href="index.html";
} else {
    resu="usuario y contraseña no valido";
    window.alert(resu);
    document.write('<a href="pruebajs.html">Reintentar</a>');
}

//document.write(resu);


