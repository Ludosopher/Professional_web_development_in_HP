<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id()) ->paginate(3);
        return view('admin.users.users')->with('users', $users);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->password) {
            $this->validate($request, $this->validateRules($user), [], $this->attributeNames());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
                $user->save();
                return redirect()->route('admin.users.index')->with('success', 'Данные пользователя успешно изменены!');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
                return redirect()->route('admin.users.index')->withErrors($errors);
            }
        } else {
            $user->is_admin = !$user->is_admin;
            $result = $user->save();

            if ($result) {
                return redirect()->route ('admin.users.index')->with('success', 'Статус пользователя изменён !');
            } else {
                return redirect()->route ('admin.users.index')->with('error', 'Ошибка изменения статуса пользователя!');
            }
        }
    }



   public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route ('admin.users.index')->with('success', 'Пользователь удалён!');
    }

    protected function validateRules($user) {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
