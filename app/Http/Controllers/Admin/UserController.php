<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

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
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect(route('admin.users.index'));
        }

        $roles = Role::all();
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = request('name');
        $user->email = request('email');

        if ($user->save() && $user->roles()->sync($request->roles)) {
            $request->session()->flash('success', 'Promjene za korisnika ' . $user->name . ' sačuvane');
        } else {
            $request->session()->flash('error', 'Desila se greška. Promjene nisu sačuvane.');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if (Gate::denies('delete-users')) {
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();

        if ($user->delete()) {
            $request->session()->flash('success', 'Korisnik ' . $user->name . ' izbrisan');
        } else {
            $request->session()->flash('error', 'Desila se greška. Promjene nisu sačuvane.');
        }

        return redirect()->route('admin.users.index');
    }
}
