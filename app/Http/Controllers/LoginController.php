<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // VK
        public function loginVK() {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository) {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('vkontakte')->user();

        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }

    // GitHub
    public function loginGitHub() {
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('github')->redirect();
    }

    public function responseGitHub(UserRepository $userRepository) {
//        $user = Socialite::driver('github')->stateless()->user();
//        dd($user);
        if (Auth::check()) {
            return redirect()->route('Home');
        }
        $user = Socialite::driver('github')->user(); // ->stateless()

        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }
}
