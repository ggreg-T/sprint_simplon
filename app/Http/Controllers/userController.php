<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trecks;
use App\Models\Treckers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast;

class userController extends Controller
{
    public function users() 
    {
        $data['users'] = User::orderBy('created_at', 'ASC')->paginate(100);
        return view('users.users', $data);
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

        return redirect()->back()
            -> with('success', 'inscription successed, please login');
    }

    public function login_action(Request $request)
    {
        $request -> validate([
            'inputRegister' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['pseudo' => $request->inputRegister, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->back()
                ->with('success', 'Welcome '.Auth::user()->pseudo);
        } elseif (Auth::attempt(['email' => $request->inputRegister, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->back()
                ->with('success', 'Welcome '.Auth::user()->pseudo);
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

    public function destroyResa($treckerId)
    {
        // $treckerId->delete();
        DB::table('treckers')->where('id', '=', $treckerId)->delete();

        return redirect()->back()
            ->with('success', 'Your trip was deleted with success.');
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

        // dd($request);
        if ($request->inputUserStatus == "selectUser") {
            $admin = 0;
            $operator = 0;
        } elseif ($request->inputUserStatus == "selectOpera") {
            $admin = 0;
            $operator = 1;
        } elseif ($request->inputUserStatus == "selectAdmin") {
            $admin = 1;
            $operator = 0;
        }
        
        // dd($admin);
        $user = User::find($id);
        $user ->admin = $admin;
        $user ->operator = $operator;
        $user ->save();

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

    public function userTrecksView() 
    {
        $title = "Welcome ".Auth::user()->pseudo;

        $trecksResa = Trecks::rightJoin('treckers', 'trecks.id', '=', 'treckers.treckId')
            ->select('trecks.img',
                    'trecks.treckName',
                    'treckers.id',
                    'treckers.dateTreck',
                    'treckers.treckStart',
                    'treckers.treckEnd',
                    'treckers.treckEndLimit',
                    'treckers.timeTreck',
                    'treckers.timeTampon')
            ->where('treckers.idUser', '=', Auth::user()->id)
            ->where('treckers.endConfirmed', '=', false)
            ->where('treckers.treckStandBy', '=', true)
            ->orderBy('treckers.dateTreck', 'asc')
            ->get();

        $trecksDone = Trecks::rightJoin('treckers', 'trecks.id', '=', 'treckers.treckId')
            ->select('trecks.img',
                    'trecks.treckName',
                    'treckers.id',
                    'treckers.dateTreck',
                    'treckers.treckStart',
                    'treckers.treckEnd',
                    'treckers.treckEndLimit')
            ->where('treckers.idUser', '=', Auth::user()->id)
            ->where('treckers.endConfirmed', '=', true)
            ->orderBy('treckers.dateTreck', 'asc')
            ->get();

        $treckRoad = Trecks::rightJoin('treckers', 'trecks.id', '=', 'treckers.treckId')
            ->select('trecks.img',
                    'trecks.treckName',
                    'treckers.id',
                    'treckers.dateTreck',
                    'treckers.treckStart',
                    'treckers.treckEnd',
                    'treckers.treckEndLimit')
            ->where('treckers.idUser', '=', Auth::user()->id)
            ->where('treckers.treckStandBy', '=', false)
            ->where('treckers.endConfirmed', '=', false)
            ->orderBy('treckers.dateTreck', 'asc')
            ->get();

        return view('users/userTrecksView', [
            'title' => $title,
            'treckResa' => $trecksResa,
            'treckDone' => $trecksDone,
            'treckRoad' => $treckRoad]);
    }

    public function goTreck(Request $request, $id)
    {
        $controlDouble = Treckers::query()
            ->where('idUser', '=', Auth::user()->id)
            ->where('treckStandBy', '=', false)
            ->where('treckers.endConfirmed', '=', false)
            ->get();
        if (count($controlDouble) > 0) {
            return redirect()->back()
            ->with('error', "You can\'t do more then one trip at the same time.");
        }

        //###---update time informations for treck start and end---##############################
        $timeTreck = $request->inputTimeTreck;
        // dd($timeTreck);
        $timeTampon = $request->inputTimeTampon;
        // dd($timeTampon);
        $treckDate = date("Y:m:d");
        $treckStart = date("H:i");
        $treckEnd = date("H:i", strtotime($treckStart.' + '.$timeTreck.' minute'));  
        $treckEndLimit = date('H:i', strtotime($treckEnd.' + '.$timeTampon.' minute'));
        //----------------------------------------------------------------------------------------
        $trecker = Treckers::find($id);
        $trecker->treckStart = $treckStart;
        $trecker->dateTreck = $treckDate;
        $trecker->treckEnd = $treckEnd;
        $trecker->treckEndLimit = $treckEndLimit;
        $trecker->treckStandBy = false;
        $trecker->save();
        
        return redirect()->back()
            ->with('success', 'Good Trip');
    }
    public function endTreck($id)
    {
        $trecker = Treckers::find($id);
        $trecker->endConfirmed = true;
        $trecker->save();
        
        return redirect()->back()
            ->with('success', 'Welcome Back');
    }
    
    public function listUserTrecksView()
    {
        $title = 'Your own Treck Saved';
        $listTrecks = Trecks::query()
            ->where('idUser', '=', Auth::user()->id)
            ->where('private', '=', true)
            // ->orderBy('created_at', 'ASC')->paginate(100)
            ->get();

        $nbTrecks = count($listTrecks);
        if ($nbTrecks == 0) {
            $error = "You dont have personel Trecks yet.";
            return view('pages.listTrecks', ['title' => $title, 'trecks' => $listTrecks, 'error' => $error]);
        }
        $error = "";
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $listTrecks, 'error' => $error]);
    }
}

