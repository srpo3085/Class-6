<?php

Route::get('/', function()
{
    /*if(Auth::check()){
        return Redirect::to("/perfil");
    }*/
  
	return View::make('general.login');
});

Route::get('/perfil',array('before'=>'Auth', function()
{
            $publicaciones=Publicacion::orderBy('id','desc')->get();

            return View::make('perfil.perfil')
            ->with("nombre", Auth::user()->nombre)
            ->with("publicaciones", $publicaciones);
}));

Route::controller('personal','PersonalController');
Route::controller('clase','Clase2Controller');
Route::controller('publicacion','PublicacionController');

Route::post('/loguear',function(){
        $email=Input::get('correo');
        $password=Input::get('password');
        if(Auth::attempt(['correo'=>$email,'password'=>$password])){
            return Redirect::to("perfil");
        }else{
            echo "El usuario no esta logueado";
        }
        });
Route::get('/logout',function(){        
      Auth::logout();
      return Redirect::to("/");
        });        