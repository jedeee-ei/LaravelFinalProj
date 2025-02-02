<?php
namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Register New User
        Fortify::createUsersUsing(CreateNewUser::class);

        // Custom Login
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        // Login & Registration Views
        Fortify::loginView(fn() => view('login'));
        Fortify::registerView(fn() => view('register'));

        // Redirects
        Fortify::redirects('register', '/login');  // Redirect to login after registration
        Fortify::redirects('login', '/dashboard'); // Redirect to dashboard after login
        Fortify::redirects('logout', '/login');    // Redirect to login after logout

    }
}
