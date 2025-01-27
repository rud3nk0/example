<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploadPhoto(Request $request)
    {
        // Валидация
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // проверка на допустимый формат
        ]);

        // Получаем текущего аутентифицированного пользователя
        $user = Auth::user();

        // Загружаем фото в публичную папку 'uploadPhotos' через storage
        $path = $request->file('photo')->store('uploadPhotos', 'public');

        // Обновляем фото пользователя в базе данных
        $user->photo = $path;
        $user->save();  // Не забывайте сохранять изменения в базе данных!

        // Возвращаем на страницу редактирования профиля с обновленным путем
        return view('profile.edit', ['user' => $user, 'path' => $path]);

        // Возвращаем пользователя на страницу профиля с обновленным путем
        return view('profile.edit', ['user' => $user, 'path' => $path]);
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
