<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('Owner');
    }



    public function index()
    {
        $auth_id = Auth::user()->id;
        $users = User::where('admin', 1)->whereNotIn('id',[$auth_id])->orderBy('id', 'Asc')->paginate(15);
        return view('Admin.admins.index', ['users' => $users]);
    }
    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.admins.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('admins.index')->withStatus(__('Admin successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $admin)
    {
        return view('Admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $admin)
    {
        $rules = [
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
        ];
        $this->validate($request, $rules);

        $admin->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('admins.index')->withStatus(__('Admin successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $admin)
    {
      $admin->delete();

      return redirect()->route('admins.index')->withStatus(__('Admin successfully deleted.'));
    }
}
