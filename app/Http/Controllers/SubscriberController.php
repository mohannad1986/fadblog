<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Password;



class SubscriberController extends Controller
{




    public function login_subscriber()
    {
        return view('subscriber.login');
    }

    public function login_functionality(Request $request){

        //  return  $request;
        $this->middleware('single.session');

        try {
            $request->validate([
                'name'=>'required',
                'password'=>'required',
            ]);

        if (Auth::guard ('subscriber')->attempt(['name' => $request->name,'password' => $request->password])) {
            $user = Auth::guard('subscriber')->user;
            $user->is_logged_in = true;
            $user->save();
            return redirect()->route('empty');
        }else{
            toastr()->error('Invalid name or Password');
            return back();
        }
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
           }
    }

    public function logout(){
        $user =Auth::guard('subscriber')->user;
        $user->is_logged_in = false;
        $user->save();
        Auth::guard('subscriber')->logout();
        return redirect()->route('loginpage_subscriber');
    }


    public function index()
    {
        $subscribers=Subscriber::paginate(5);
        return view('subscriber.index',compact('subscribers'));
    }


    public function create()
    {
        return view('subscriber.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

        $subscriber = new Subscriber();
        $subscriber->name = $request->name;
        $subscriber->user_name = $request->username;
        $subscriber->status = $request->status;
        $subscriber->password=Hash::make($request->Password);
        $subscriber->save();
        return response()->json([
            'status' => true,

        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
           }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subscriber=Subscriber::FindOrFail($id);
        return view('subscriber.edit',compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
