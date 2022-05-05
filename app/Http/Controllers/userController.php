<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function users() 
    {
        $data['users'] = User::orderBy('created_at', 'ASC')->paginate(100);
        return view('users.users', $data);
    }

    public function register() 
    {
        $data['title'] = 'Register';
        return view('users.logReg', $data);
    }

    public function register_action(Request $request) 
    {
        // dd($request);
        $request -> validate([
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputPseudo' => 'required',
            'inputEmail' => 'required',
            'inputAge' => 'required',
            'inputTel' => 'required',
            'inputContact1' => 'required',
            'inputPhoneContact1' => 'required',
            'inputContact2' => 'required',
            'inputPhoneContact2' => 'required',
            'inputPassword' => 'required',
            'inputPassword_confirmation' => 'required|same:inputPassword'
        ]);

        // dd($request);
        $user = new User;
        $user->firstName = $request->inputFirstName;  
        $user->lastName = $request->inputLastName; 
        $user->pseudo = $request->inputPseudo;   
        $user->email = $request->inputEmail;  
        $user->age = $request->inputAge;  
        $user->phone = $request->inputTel;  
        $user->contact1 = $request->inputContact1;  
        $user->phone1 = $request->inputPhoneContact1;  
        $user->contact2 = $request->inputContact2;  
        $user->phone2 = $request->inputPhoneContact2;  
        $user->password = Hash::make($request->inputPassword);
        
        $user->save();
        return redirect() 
            -> route('logReg')
            -> with('success', 'inscription succed, please login');
    }

    // public function login() 
    // {
    //     $data['title'] = 'Login';
    //     return view('users/logReg', $data);
    // }

    public function login_action(Request $request)
    {
        $request -> validate([
            'inputRegister' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['pseudo' => $request->inputRegister, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $request->inputRegister, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        // dd($request);
        // return back();
        // return view('home');
        return back() 
            -> with('error', 'wrong identifier or password');
    }

    public function changePersoInfos() 
    {
        $data['title'] = 'Personnel Informations';
        return view('users.userDetails', $data);
    }

    public function changeUserInfos_action(Request $request)
    {
        $request -> validate([
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputPseudo' => 'required',
            'inputEmail' => 'required',
            'inputAge' => 'required',
            'inputTel' => 'required',
            'inputContact1' => 'required',
            'inputPhoneContact1' => 'required',
            'inputContact2' => 'required',
            'inputPhoneContact2' => 'required',
            'inputOld_password' => 'required|current_password',
            'inputNew_password' => 'same:inputNew_password_confirmation'
        ]);
        $user = User::find(Auth::id());
        $user->firstName = $request->inputFirstName;  
        $user->lastName = $request->inputLastName; 
        $user->pseudo = $request->inputPseudo;   
        $user->email = $request->inputEmail;  
        $user->age = $request->inputAge;  
        $user->phone = $request->inputTel;  
        $user->contact1 = $request->inputContact1;  
        $user->phone1 = $request->inputPhoneContact1;  
        $user->contact2 = $request->inputContact2;  
        $user->phone2 = $request->inputPhoneContact2;
        $user->operator = $request->inputOperator;
        $user->admin = $request->inputAdmin;
        if ($request -> inputNew_password != "" OR $request -> inputNew_password != null) {
            $user -> password = Hash::make($request -> inputNew_password);
        } 
        
        $user -> save();
        $request -> session() -> regenerate();

        return back() -> with('success', 'informations up to date');
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function searchUser(Request $request)
    {
        $userSearched = trim($request -> get('inputSearchUser'));
        $data['users'] = User::query()
                ->where('pseudo', 'like', "%{$userSearched}%")
                ->orWhere('email', 'like', "%{$userSearched}%")
                ->orderBy('created_at', 'ASC')
                ->get();

        return view('users.users', $data);
    }

    public function destroy(User $user)
    {
        $data['userAdmin'] = User::query()
            ->where('admin', '=', 1)
            ->get();

        $countUserAdmin = count($data['userAdmin']);
        if ($user->id == Auth::user()->id && $countUserAdmin == 1) {
            return redirect() -> route('users')
            -> with('success', 
                'You\'re the last admin. This site needs at last one administrator');
        } elseif ($user->id == Auth::user()->id && $countUserAdmin > 1) {
            $user->delete();
            return redirect() -> route('home')
                -> with('success', 'Your account has been deleted successfully');
        }

        $user->delete();
    
        return redirect() -> route('users')
            -> with('success', $user->pseudo.' has been deleted successfully');
    }

    public function edit($id)
    {
        $data = User::query()
            ->where('id', '=', $id)
            ->get();

        return view('users.userDetails', ['user' => $data]);
    }

    public function updateStatus(Request $request, $id)
    {
        $data['userAdmin'] = User::query()
            ->where('admin', '=', 1)
            ->get();
            
        $countUserAdmin = count($data['userAdmin']);
        if ($id == Auth::user()->id && $countUserAdmin == 1) {
            return redirect() -> route('users')
            -> with('success', 
                "You're the last admin. This site needs at last one administrator");
        }

        $user = User::find($id);
        $user -> admin = $request -> inputAdmin;
        $user -> operator = $request -> inputOperator;
        $user -> save();

        if ($user -> admin == true) {
            return redirect() -> route('users')
            -> with("success", $user->pseudo." is Administrateur");
        } elseif ($user -> operator == true) {
            return redirect() -> route('users')
            -> with("success", $user->pseudo." is operator");
        } else {
            return redirect() -> route('home')
            -> with("success", $user->pseudo." is simple user");
        }
    }
}

