<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
           'name' => 'required|string|max:255',
           'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role_id' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);
        if ($v->fails()) {
            return response()->json(['status' => 'fail', 'error' => $v->errors()]);
        }
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->user_id = mt_rand(10, 1000000000);
        $user->is_admin = $request->role_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('all/app-assets/images/profile/user-uploads/', $filename);
            $user->profile = $filename;
        }
        if ($user->save()) {
            return response()->json(['message' => 'User saved successfully', 'user' => $user]);
        }
        return response()->json(['error' => 'failed']);
    }

    public function getUserData()
    {
        $users = User::orderBy('id', 'DESC')->where('is_admin', '!=', '0')->get();
        return response()->json(['data' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);
        if ($v->fails()) {
            return response()->json(['status' => 'fail', 'error' => $v->errors()]);
        }
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->is_admin = $request->role_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('all/app-assets/images/profile/user-uploads/', $filename);
            $user->profile = $filename;
        }
        if ($user->update()) {
            return response()->json(['message' => 'Changes saved successfully', 'user' => $user]);
        }
        return response()->json(['error' => 'failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return response()->json(['message' => 'Your data has been deleted successfully', 'user' => $user]);
        }
        return response()->json(['error' => 'failed']);
    }
}
