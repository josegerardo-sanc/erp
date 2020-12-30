<?php



namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller

{
    // nota se modifico el archivo ya que tiene un middleware el cual solicita la constante home
    # app\Http\Middleware/RedirectIfAuthenticated

    use AuthenticatesUsers;

    protected $redirectTo ="/";


    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $data=$request->all();
        // return json_encode(['data'=>$data,'status'=>400,'info'=>'probando el request']);
        $correo=isset($data['correo'])?$data['correo']:'';
        $password=isset($data['password'])?$data['password']:'';

        $MENSAJE_ERROR="";
        if($correo==""){
            $MENSAJE_ERROR.="<div><i class='fas fa-exclamation-circle'></i> Debes ingresar tu correo</div>";
        }

        if($password==""){
            $MENSAJE_ERROR.="<div><i class='fas fa-exclamation-circle'></i> Debes ingresar tu clave de acceso</div>";
        }
        if($MENSAJE_ERROR!=""){
            return json_encode(['status'=>400,'info'=>$MENSAJE_ERROR]);
        }

        $Permanecer_registrado=$data['Permanecer_registrado'];


        $user = DB::table('users')->where('email',$correo)->get();

        // validacion de datos
        if(count($user)<=0){
            return json_encode([
                'status'=>400,'info'=>"<div><i class='fas fa-exclamation-circle'></i> El correo que ingresaste no se encuentra registrado en el sistema</div>"
                ]);
        }
        // saber si esta activa la cuenta
        if($user[0]->{'is_deleted'}=="1"){
            return json_encode([
                'status'=>400,
                'info'=>"<div><i class='fas fa-exclamation-circle'></i> Tu cuenta esta desactivada, para mayor información comunicate al numero:9321078928.</div>"
                ]);

        }else if($user[0]->{'is_active'}=="0"){
            return json_encode([
                                'status'=>400,'info'=>"<div><i class='fas fa-exclamation-circle'></i> No has confirmado tu cuenta de correo electrónico.</div>"
                              ]);
        }

        if (!(Hash::check($password,$user[0]->{'password'})) ) {
            return json_encode(['status'=>400,'info'=>"<div><i class='fas fa-exclamation-circle'></i> La contraseña que ingresaste es incorrecta.</div>"]);
        }

        if (Auth::attempt(['email' => $user[0]->{'email'},'password' =>$password],$Permanecer_registrado)) {
            return json_encode([
                'status'=>200
            ]);

        }else{
            return json_encode(['status'=>400,'info'=>"<div><i class='fas fa-exclamation-circle'></i> Se perdio la comunicación con el servidor intentelo de nuevo.</div>"]);
        }
        // $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password']))){
        //     return redirect('/');
        // }else{
        //     return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        // }


    }

}
