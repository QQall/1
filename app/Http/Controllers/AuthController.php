<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requestuse;
use App\Http\Requests\UserRequest;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirectToSteam()
    {
        return Socialite::driver('steam')->redirect();
    }

	public function handleSteamCallback()
	{
		$steamUser = Socialite::driver('steam')->user();

		// Проверяем, существует ли пользователь в базе данных по его Steam ID
		$user = User::where('steam_id', $steamUser->id)->first();

		// Если пользователь не найден, создаем новую запись
		if (!$user) {
			$user = User::create([
				'steam_id' => $steamUser->id,
				// Другие поля, которые вы хотите сохранить
			]);
		}

		// Аутентифицируем пользователя в системе
		Auth::login($user);

		// После аутентификации можете выполнить редирект или отправить ответ API
		return redirect('/admin/setting');
		
	}
}
