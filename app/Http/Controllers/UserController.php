<?php 
    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;
    use LoginImplementation;

    class UserController extends Controller{
        public function loginIndex(){
            return view('login');
        }

        public function loginIndexPost(Request $request){
            
                $request->validate([
                'email' => 'required',
                'password'=>'required']);
            
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)){
                return redirect()->intended(route('userWelcome'));
            } 
            return redirect(route('login'))->with("error","incorrect username or password");
            }
        

         public function registerIndex(){
            return view ('register');
        }
        public function registerIndexPost(Request $request){
            // dd($request->all());
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required',
                'phone_number'=>'required|unique:users',
                'state'=>'required',
                'country'=>'required'
            ]);
            // echo "hello";
            $data['first_name']= $request->first_name;
            $data['last_name']=$request->last_name;
            $data['name']= $request->first_name.' '.$request->last_name;
            $data['email']=$request->email;
            $data['password']=Hash::make($request->password);
            $data['phone_number']=$request->phone_number;
            $data['state']=$request->state;
            $data['country']=$request->country;
            User::create($data);

        }

        public function logoutIndex(){
            Session::flush();
            Auth::logout();
            return redirect(route('welcome'));
        }
    }