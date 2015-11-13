$("#form").submit(function(e){
	e.preventDefault();
});


$("#boton").click(function(){

	var validator = $("#form").validate({
		rules:{
			email:"required",    
            
			name:
				"required" 
                ,
			nick:{
				required:true,
				minlength:9
			},
			password:{
				required:true,
				minlength:5
			},
          
			confirm:{
				required:true,
				minlength:5
			},
			direccion:{
				required:true,

			},
			cedula:{
				required:true,
				minlength:11
			},
            tel:{
                required:true,
                minlength:10,
                digits:true
            }
            

		},messages:{
			
            name:{
              required:"Ingrese un nombre"  
            },
			nick:{
				minlength:"Por favor ingrese al menos un nick de 9 cracteres",
				required:"Por favor ingrese un nick"
			},
			email:{
				required:"Por favor ingrese una dirección de correo electronico",
				email:"Ingrese una dirección valida"
			},
			password:{
				required:"Por favor ingrese una contraseña",
				minlength: "La contraseñadebe ser de al menos 5 digitos"
			},
			confirm:{
				required:"Por favor ingrese una contraseña",
				minlength: "La contraseñadebe ser de al menos 5 digitos"
			},
			direccion:{
				required:"Por favor ingrese una direccion"
			},
			cedula:{
				required:"Ingrese un número de cedula",
				cedula:"Ingrese 11 digitos"
			},
            tel:{
				required:"Ingrese un número telefónico",
				minlength:"Ingrese 10 digitos",
                digits:"Ingrese solo números"
			}



			}
	});
	
});

$("#form").submit(function(e){
	e.preventDefault();
});


$("#boton2").click(function(){

	var validator = $("#form2").validate({
		rules:{
			inputEmail:"required",    
            
			name:
				"required" 
                ,
			nick:{
				required:true,
				minlength:9
			},
			password:{
				required:true,
				minlength:5
			},
          
			confirm:{
				required:true,
				minlength:5
			},
			direccion:{
				required:true,

			},
            tel:{
                required:true,
                minlength:10,
                digits:true
            },
            age:{
                required:true,
                digits:true,
                minlength:4
                
            }
            
            

		},messages:{
			
            name:{
              required:"Ingrese un nombre"  
            },
			nick:{
				minlength:"Por favor ingrese al menos un nick de 9 cracteres",
				required:"Por favor ingrese un nick"
			},
			email:{
				required:"Por favor ingrese una dirección de correo electronico",
				email:"Ingrese una dirección valida"
			},
			password:{
				required:"Por favor ingrese una contraseña",
				minlength: "La contraseñadebe ser de al menos 5 digitos"
			},
			confirm:{
				required:"Por favor ingrese una contraseña",
				minlength: "La contraseñadebe ser de al menos 5 digitos"
			},
			direccion:{
				required:"Por favor ingrese una direccion"
			},
			
            tel:{
				required:"Ingrese un número telefónico",
				minlength:"Ingrese 10 digitos",
                digits:"Ingrese solo números"
			},
            age:{
                required:"Escriba su año de nacimiento",
                digits:"Escriba solo números",
                minLength:"Escriba el año con 4 digitos: ej. 2015",
                maxlength:"Escriba el año con 4 digitos: ej. 2015"
                
            }



			}
	});
	
});

$("#boton3").click(function(){

	var validator = $("#form3").validate({
		rules:{
			
			nick:{
				required:true,
				minlength:9
			},
			password:{
				required:true,
				minlength:5
			}
            
            

		},messages:{
			
           
			nick:{
				minlength:"Por favor ingrese al menos un nick de 9 cracteres",
				required:"Por favor ingrese un nick"
			},
			password:{
				required:"Por favor ingrese una contraseña",
				minlength: "La contraseñadebe ser de al menos 5 digitos"
            }



			}
	});
	
});






