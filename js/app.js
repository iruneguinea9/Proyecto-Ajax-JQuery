 var pathname = window.location.pathname;
var segments = pathname.split('/');
var filename = segments[segments.length - 1];
console.log(filename);

$(document).ready(function() {
    var idUser = getCookie('id_user');
    console.log("id usuario "+idUser);
    if(idUser === '1') {
        var newButton = document.createElement('button');
        newButton.innerHTML = '+';
        newButton.className = 'btn btn-success rounded-circle position-fixed bottom-0 end-0 px-3 mx-3 mb-3 fs-5';
        newButton.onclick = function() {
            window.location.href = 'pages/aniadirDisco.php';
        };
        document.body.appendChild(newButton);
        if (filename == 'detalleDisco.php') {
            var newButton2 = document.createElement('button');
            newButton2.innerHTML = 'Editar detalles';
            newButton2.className = 'btn btn-success rounded-circle position-fixed bottom-0 end-0 px-3 mx-3 mb-3 fs-5';
            newButton2.onclick = function() {
                window.location.href = 'pages/editarDisco.php';
            };

          
        }
    }
    

    // -------------------------- formulario ------------------------------
    if (filename == 'aniadirDisco.php') {
        $("form").submit(function (event) {
           
            var formData = {
              titulo: $("#titulo").val(),   
              autor: $("#autor").val(),
              imagen: $("#imagen").val(),
              descripcion: $("#descripcion").val(),
              precio: $("#precio").val(),
              categoria: $("#categoria").val(),
            };
         console.log(formData);
            $.ajax({
              type: "POST",
              url: '/ajax/PROYECTO-CRUD-FETCH/php/aniadirDisco.php',
              data: JSON.stringify(formData),
              contentType: "application/json",
                processData: false,
            }).done(function (data) {
              console.log(data);
              window.location.href = '../index.php';
            });
        
            event.preventDefault();
         });
     
        
        
           
    }
   // --------------------------  obtener discos ------------------------------
   if (filename == 'index.php') {
 
    $.ajax({
        url: '/ajax/PROYECTO-CRUD-FETCH/php/obtenerdiscos.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
           $.each(data, function(index, element) {
               var card = $('<div>').addClass('col-sm-3');
               var cardDiv = $('<div>').addClass('card');
               var img = $('<img>').addClass('card-img-top').attr('src', element.imagen).attr('alt', 'Card image cap');
               var cardBody = $('<div>').addClass('card-body');
               var h5 = $('<h5>').addClass('card-title d-flex justify-content-between');
               var spanTitle = $('<span>').addClass('like-title title-filter').text(element.titulo);
               var p = $('<p>').addClass('card-text').text(element.descripcion);
               var cardFooter = $('<div>').addClass('card-footer');
               var smallText = $('<small>').addClass('text-muted').text('Visualizaciones: '+element.visualizaciones);
  
               h5.append(spanTitle);
               cardBody.append(h5, p);
               cardFooter.append(smallText);
               cardDiv.append(img, cardBody, cardFooter);
               card.append(cardDiv);
  
               $('.row.mx-3.mt-3').append(card);
               img.click(function() {
                window.location.href = 'pages/detalleDisco.php?id=' + element.id_disco;
             });
            
           });
        },
        error: function() {
            alert('Hubo un problema al intentar obtener los datos');
        }
    });
    
  
    var loginButton = document.getElementById('botonLogin');
    var logoutButton = document.getElementById('botonLogout');
  
    if (getCookie('id_user')) {
      loginButton.style.display = 'none';
      logoutButton.style.display = 'block';
  } else {
      loginButton.style.display = 'block';
      logoutButton.style.display = 'none';
  }
      loginButton.addEventListener('click', login);
      logoutButton.addEventListener('click', logout);
      function login() {
          console.log("A login");
          window.location.href = 'pages/loginpag.php';
      }
      function logout() {
          eraseCookie('id_user');
          console.log("cookie eliminada");          
          
          window.location.href = 'pages/loginpag.php';
      }

    

   }

   // --------------------------  obtener favoritos ------------------------------
   if (filename == 'favoritos.php') {
    if(getCookie("id_user")!=null){
    $.ajax({
        url: '/ajax/PROYECTO-CRUD-FETCH/php/obtenerFavoritos.php',
        type: 'POST',
        dataType: "json",
        data: {id_user: getCookie("id_user")},        
        success: function(data) {
            if(data.length === 0) {
                var div = $('<h3>').text("No hay discos marcados como favorito");
                $('.row.mx-3.mt-3').append(div);
            } else {
           $.each(data, function(index, element) {
               var card = $('<div>').addClass('col-sm-3');
               var cardDiv = $('<div>').addClass('card');
               var source= '../'+ element.imagen;
               var img = $('<img>').addClass('card-img-top').attr('src',source).attr('alt', 'Card image cap');
               var cardBody = $('<div>').addClass('card-body');
               var h5 = $('<h5>').addClass('card-title d-flex justify-content-between');
               var spanTitle = $('<span>').addClass('like-title').text(element.titulo);
               var heart = $('<span>').addClass('heart fas fa-heart');
               heart.css('color', 'red');
               var p = $('<p>').addClass('card-text').text(element.descripcion);
               var cardFooter = $('<div>').addClass('card-footer');
               var smallText = $('<small>').addClass('text-muted').text('Visualizaciones: '+element.visualizaciones);
  
               h5.append(spanTitle, heart);
               cardBody.append(h5, p);
               cardFooter.append(smallText);
               cardDiv.append(img, cardBody, cardFooter);
               card.append(cardDiv);
               
               $('.row.mx-3.mt-3').append(card);
               heart.click(function() {
                if(confirm("Quitar de favoritos?")){
                    $.ajax({
                        url: '/ajax/PROYECTO-CRUD-FETCH/php/eliminarFavorito.php',
                        type: 'POST',
                        dataType: "json",
                        data: {
                            id_disco: element.id_disco,
                            id_user: getCookie("id_user")
                        },        
                        success: function(response) {                           
                            window.location.href = '../index.php';
                            
                        },
                        
                    });
                }
               });
               
               
           });
        }
        },
        error: function() {
            alert('Hubo un problema al intentar obtener los datos');
        }
    });}
    else{
        var div = $('<h1>').text("Inicia sesión para ver tus favoritos");
        $('.row.mx-3.mt-3').append(div);
    }
   }

   // --------------------------  login ------------------------------
   if (filename == 'loginpag.php') {
    $('form').on('submit', function(event) {
        event.preventDefault();
        var username = $('#usuario').val();
        var password = $('#contra').val();
        $.ajax({
            url: '/ajax/PROYECTO-CRUD-FETCH/php/login.php',
            type: 'POST',
            dataType: "json",
            data:{
                username: username,
                password: password,
            },
            success: function(response) {
                if (response.success) {
                   // Si es correcto
                   setCookie("id_user",response.id_user,1); 
                   window.location.href = '../index.php';
                } else {
                   // Error
                   console.log("Error");
                   alert('Usuario o contraseña incorrectos');
                }
            }
        });        
    });
   }
    // --------------------------  editarDisco ------------------------------
    if (filename == 'editarDisco.php') {
        var params = new URLSearchParams(window.location.search);
        var discId = params.get('id');
        $.ajax({
            url: '/ajax/PROYECTO-CRUD-FETCH/php/obtenerDetalles.php',
            type: 'GET',
            data: {
                id: discId
            },
            dataType: 'json',
            success: function(data) {
                disc=data[0];
                document.getElementById('titulo').setAttribute('value', disc.titulo);
                document.getElementById('autor').setAttribute('value', disc.autor);
                document.getElementById('imagen').setAttribute('value', disc.imagen);
                document.getElementById('descripcion').setAttribute('value', disc.descripcion);
                document.getElementById('precio').setAttribute('value', disc.precio);
                document.getElementById('categoria').setAttribute('value', disc.categoria);
                
            },
            error: function() {
                alert('Hubo un problema al intentar obtener los detalles del disco');
            }
        });
        $("form").submit(function (event) {
           
            var formData = {
              id:discId,
              titulo: $("#titulo").val(),   
              autor: $("#autor").val(),
              imagen: $("#imagen").val(),
              descripcion: $("#descripcion").val(),
              precio: $("#precio").val(),
              categoria: $("#categoria").val(),
            };
         console.log(formData);
            $.ajax({
              type: "POST",
              url: '/ajax/PROYECTO-CRUD-FETCH/php/actualizarDisco.php',
              data: JSON.stringify(formData),
              contentType: "application/json",
                processData: false,
            }).done(function (data) {
              console.log(data);
              alert("disco guardado");
              window.location.href = 'detalleDisco.php?id=' + discId;

            });
        
            event.preventDefault();
         });
        
        
    }
   // --------------------------  detalleDisco ------------------------------
   if (filename == 'detalleDisco.php') {
    var params = new URLSearchParams(window.location.search);
    var discId = params.get('id');

    $.ajax({
        url: '/ajax/PROYECTO-CRUD-FETCH/php/obtenerDetalles.php',
        type: 'GET',
        data: {
            id: discId
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            disc=data[0];
            var container = $('<div>').addClass('container');
            var row = $('<div>').addClass('row');
            var col1 = $('<div>').addClass('col-md-5');
            var projectInfoBox1 = $('<div>').addClass('project-info-box mt-0');
            var h5 = $('<h5>').addClass('mb-5').text(disc.titulo);
            var p = $('<p>').addClass('mb-2').text(disc.descripcion);
            var projectInfoBox2 = $('<div>').addClass('project-info-box').attr('id', 'cajaAdmin');
            var autor = $('<p>').html('<b>Autor:</b> ' + disc.autor);
            var categoria = $('<p>').html('<b>Categoria:</b> ' + disc.categoria);
            var visualizaciones = $('<p>').html('<b>Visualizaciones:</b> ' + disc.visualizaciones);
            var precio = $('<p>').html('<b>Precio:</b> ' + disc.precio+'€');
            var btnFavorito = $('<button>').addClass('btn btn-danger').html('<i class="fas fa-heart"></i> Añadir a favoritos');
            var col2 = $('<div>').addClass('col-md-7');
            var img = $('<img>').attr('src', '../'+disc.imagen).attr('alt', 'project-image').addClass('rounded').width(300).height(300);



            

            projectInfoBox1.append(h5, p);
            projectInfoBox2.append(autor, categoria, visualizaciones, precio,btnFavorito);
            col1.append(projectInfoBox1, projectInfoBox2);
            col2.append(img);
            row.append(col1, col2);
            container.append(row);
            
            $('body').append(container);
            btnFavorito.click( function() {
                // Mirar si ya estaba en favoritos y si no es asi añadirlo 
                aniadirAFav(discId);
                
            });
           
            if(idUser === '1') {
                var projectInfoBox3 = $('<div>').addClass('project-info-box mt-5');
                var btnEditar = document.createElement('button');
                btnEditar.innerHTML = 'EDITAR';
                btnEditar.className = 'btn btn-success';
                btnEditar.onclick = function() {
                    window.location.href = 'editarDisco.php?id='+discId;
                };

                var btnBorrar = document.createElement('button');
                btnBorrar.innerHTML = 'BORRAR';
                btnBorrar.className = 'btn btn-danger';
                btnBorrar.onclick = function() {
                    if(confirm('Seguro que quieres borrar el disco? ')) {
                        $.ajax({
                            url: '/ajax/PROYECTO-CRUD-FETCH/php/eliminarDisco.php',
                            type: "POST",
                            data: JSON.stringify({id : discId}), 
                            contentType: "application/json", 
                            success: function() {
                                alert("Se ha eliminado el disco");
                                window.location.href = '../index.php';
                            }
                        });
                        
                    }
                };

                projectInfoBox3.append(btnEditar,btnBorrar);
                col1.append(projectInfoBox3);
            }
            var heartIcon = btnFavorito.find('.fa-heart');
            setInterval(function() {
             heartIcon.animate({
                 fontSize: '+=2px'
             }, 200, function() {
                 heartIcon.animate({
                     fontSize: '-=2px'
                 }, 200);
             });
         }, 1000);
         
        },
        error: function() {
            alert('Hubo un problema al intentar obtener los detalles del disco');
        }
    });
   }

   $(".form-control").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".title-filter").filter(function() {
        var parentCard = $(this).closest('.card');
        parentCard.toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
 


function aniadirAFav(id_disco){
    $.ajax({
        url: '/ajax/PROYECTO-CRUD-FETCH/php/aniadirAFav.php',
        type: 'POST',
        dataType: "json",
        data: {
            id_disco: id_disco,
            id_user: getCookie("id_user")
        },        
        success: function(response) {
            if (response.added) {
                alert('El disco ha sido añadido a tus favoritos!');
                window.location.href = '../index.php';
            } else {
                alert('Este disco ya está en tu lista de favoritos!');
            }
        },
        error: function() {
            alert('Hubo un problema al intentar añadir el disco a tus favoritos');
        }
    });
}
$("#searchBar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".card").filter(function() {
        $(this).toggle($(this).find('.card-title .title-filter').text().toLowerCase().indexOf(value) > -1)
    });
});


});

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function eraseCookie(name) {   
    document.cookie = name + "=; max-age=0; path=/";
    console.log("function eraseCookie ejecutada");
}