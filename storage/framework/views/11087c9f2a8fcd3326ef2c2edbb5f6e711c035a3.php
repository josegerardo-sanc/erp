<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar sesion</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="utf-8">
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('css/style.default.css') ?>" id="theme-stylesheet" type="text/css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('css/custom-default.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/loader.css')); ?>">

    <style>
        .icon {
            /* color: white; */
            text-decoration: none;
            padding: .7rem;
            display: flex;
            transition: all .5s;
            font-size: 20px;
        }

        /* .icon-facebook {
            background: #2E406E;
        }

        .icon-twitter {
            background: #339DC5;
        }

        .icon-youtube {
            background: #E83028;
        } */
        .icon:hover {
            color:black;
        }

        .contenedor_imagen {
                display:block;
        }
        .formulario_login_user{
             border:1px solid transparent;
         }

        @media (max-width: 769px) {
            .contenedor_imagen{
                display: none;
            }
        }

    </style>


  </head>
  <body>

    <div class="conte_loader_MyStyle" style="display:none;">
        <div class="loader_MyStyle"></div>
    </div>

    <?php
    /*
    session_start();
    session(['status_confirm_error' => 'olisss como estas']);
    session()->forget('status_confirm_error');
    */
    ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 contenedor_imagen"  style="overflow: hidden;">
            <img src="<?php echo e(asset('storage')."/recursos_sistema/portada.jpg"); ?>"
                alt="portada"
                style="position: absolute;top:0px;left:0px;display:block;width:800px;height:100%;object-fit:cover;">
        </div>
        <div class="d-flex align-items-center flex-column col-sm-12 col-md-6 formulario_login_user" style="height: 100vh;">
            <div style="margin-bottom:5px;"></div>
            <div class="form-group" style="width: 100%">
                <div class="d-flex justify-content-between">
                    <div class="col-sm-8 d-flex align-items-center" style="height:80px">
                        <img src="https://www.magtel.es/wp-content/uploads/2016/02/Logos-Fibra-Optica-10.jpg" style="height:70px;width:70px;object-fit: cover;" alt="logo">
                        
                    </div>
                    <div class="col-sm-4  d-flex justify-content-end align-items-center" style="height:80px">
                        <a href="#" class="icon icon-facebook">
                           <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="icon icon-twitter">
                           <i class="fab fa-twitter-square "></i>
                        </a>
                        <a href="#" class="icon icon-youtube">
                           <i class="fab fa-youtube"></i>
                        </a>
                   </div>
                </div>
                <div>
                    <h3 class="text-center mt-4 mb-2 font-italic text-primary">
                        Nombre de la empresa
                    </h3>
                </div>
                <div class="form-group" style="width: 100%">
                    <?php if(session('status_confirm_error')): ?>
                        <div class="conte_confirm_error " style="width: 100%;padding:0px;margin:5px 0px;">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo e(session('status_confirm_error')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="conte_mensaje" style="width: 100%;padding:0px;margin:15px 0px;"></div>
                </div>
                
                <label class="col-form-label mb-1" id="titulo_tipo_clave">Correo</label>
                <div class="clearfix"></div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1" style="background-color:white"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control input_curp_validar" id="correo_input" placeholder="Ingresa tu correo" aria-label="correo_input" aria-describedby="basic-addon1" maxlength="50">
                </div>
                <div class="content_error_curp"></div>
            </div>
            <div class="form-group" style="width: 100%">
                    <label class="col-form-label d-flex justify-content-between align-items-end mb-1">
                        <span>Contraseña</span>
                        <a href="<?php echo e(url('/recuperar/password')); ?>" class="d-block small">¿Se te olvidó tu contraseña?</a>
                    </label>
                <div class="input-group mb-0">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1" style="background-color:white"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password_input" placeholder="Ingresa tu contraseña" aria-label="password_input" aria-describedby="basic-addon1" maxlength="30">
                </div>
            </div>
            <div class="d-flex justify-content-end form-group" style="width:100%; margin-bottom:50px;">
                <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input" name="Permanecer_registrado" id="Permanecer_registrado">
                        <small class="custom-control-label">Permanecer registrado</small>
                </label>
            </div>
            <button type="button" class="btn btn-primary btn-block" id="btn_IniciarSesion">Iniciar Sesión</button>

            <div class="form-group" style="margin-top:50px; display:none">
                <a href="" class="fb connect" style="width: 100%"><i class="fab fa-facebook-square"></i> Iniciar Sesión Facebook</a>
                <a href="" class="gmail" style="margin-top:20px;width: 100%"> <i class="fab fa-google-plus-square"></i> Iniciar Sesión Facebook</a>
            </div>

        </div>
    </div>
</div>
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>
    <script>
        let csrf_token=$('meta[name="csrf-token"]').attr('content');
        const headers_config={"Content-Type": "application/json","Accept": "application/json","X-Requested-With": "XMLHttpRequest","X-CSRF-Token":csrf_token};

        $('#correo_input').on('keypress',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code==13){
                callSesion_login();
            }
        });
        $('#password_input').on('keypress',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            if(code==13){
                callSesion_login();
            }
        });

        function callSesion_login(){
            $('.conte_confirm_error').html('');

            let correo_input=$('#correo_input').val();
            let password_input=$('#password_input').val();

            if(correo_input==""){
                $('#correo_input').focus();
                return false;
            }
            if(password_input==""){
                $('#password_input').focus();
                return false;
            }

            if(correo_input!="" && password_input!=""){
                $('#btn_IniciarSesion').click();
            }
        }


        $('#btn_IniciarSesion').on('click',function(){


            let correo_input=$('#correo_input').val();
            let password_input=$('#password_input').val();

            let Permanecer_registrado=false;
            if($('#Permanecer_registrado').is(':checked')){
                Permanecer_registrado=true;
            }

            let objectData={
                'correo':correo_input,
                'password':password_input,
                'Permanecer_registrado':Permanecer_registrado
            };

            let this_element=$(this);
            let this_element_text=$(this).html();
            $('.conte_mensaje').html('');

            console.log(objectData);

            $.ajax(
                {
                url :'/login',
                type:'POST',
                headers:{"X-CSRF-Token": csrf_token},
                data :objectData,
                beforeSend:function(){
                     $('.conte_loader_MyStyle').css({display:'flex'});
                     $(this_element).html('<i class="fas fa-sync fa-spin"></i> Procesando.......').attr('disabled','disabled');
                    }
                })
                .done(function(respuesta) {
                    console.log(respuesta);

                    $(this_element).html(this_element_text).removeAttr('disabled');
                    var json=JSON.parse(respuesta);
                    console.log(json);

                    // return false;

                    if(json.status=="400"){
                        $('.conte_loader_MyStyle').css({display:'none'});

                        $('.conte_mensaje').html(
                        `<div class='alert alert-warning alert-dismissible fade show'>
                            ${json.info}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>`);
                    }
                    if(json.status=="200"){
                         $(this_element).html('<i class="fas fa-sync fa-spin"></i> Redireccionando.......');
                         window.location.href ="/";
                    }
                    $("html, body").animate({ scrollTop: 0 }, 600);

                }).fail(function(jqXHR,textStatus) {
                    $('.conte_loader_MyStyle').css({display:'none'});
                    console.error(jqXHR.responseJSON);
                    $(this_element).html(this_element_text).removeAttr('disabled');
                })
        });
    </script>

    </body>

</html>



<?php /**PATH C:\Users\GP-THINKPAD T410\Desktop\erp_pos_full\erp_pos\resources\views/auth/login.blade.php ENDPATH**/ ?>