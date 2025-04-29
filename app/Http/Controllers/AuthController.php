<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Show the login form
     * 
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }

    /**
     * Handle login request
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
         // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials, $request->filled('remember'))) {
             $request->session()->regenerate();
            
             return redirect()->intended(route('dashboard'));
        }
 
        // Authentication failed
        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Girilen bilgiler kayıtlarımızda bulunamadı.',
            ]);
    }

    /**
     * Show the registration form
     * 
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.register');
    }

    /**
     * Handle registration request
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Custom password validation for tracking requirements
        $passwordRequirements = [
            'uppercase' => false,
            'number' => false,
            'special' => false,
            'length' => false,
        ];

        // Validate the form data with custom password rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => [
                'required',
                'string',
                Password::min(12)->rules([
                    function ($attribute, $value, $fail) use (&$passwordRequirements) {
                        // Check for uppercase letter
                        if (!preg_match('/[A-Z]/', $value)) {
                            $fail('Şifre en az bir büyük harf içermelidir.');
                        } else {
                            $passwordRequirements['uppercase'] = true;
                        }
                        
                        // Check for number
                        if (!preg_match('/[0-9]/', $value)) {
                            $fail('Şifre en az bir rakam içermelidir.');
                        } else {
                            $passwordRequirements['number'] = true;
                        }
                        
                        // Check for special character
                        if (!preg_match('/[!@#$%^&*]/', $value)) {
                            $fail('Şifre en az bir özel karakter (!@#$%^&*) içermelidir.');
                        } else {
                            $passwordRequirements['special'] = true;
                        }
                        
                        // Check for length
                        if (strlen($value) < 12) {
                            $fail('Şifre en az 12 karakter uzunluğunda olmalıdır.');
                        } else {
                            $passwordRequirements['length'] = true;
                        }
                    }
                ]),
            ],
            'terms_conditions' => 'required|accepted',
            'privacy_policy' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('validation.password_requirements', $passwordRequirements);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => '+90' . $request->phone,
            'password' => Hash::make($request->password),
            'marketing_emails' => $request->has('marketing_emails'),
            'terms_accepted' => true,
            'privacy_accepted' => true,
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'Hesabınız başarıyla oluşturuldu!');
    }

    /**
     * Log the user out
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
 

        return redirect()->route('login');
    }
}