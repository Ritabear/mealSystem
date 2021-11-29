<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            // 'username' => ['required', 'string', 'max:255'],
            'account' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            // 'username' => $input['username'],
            'account' => $input['account'],
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'adress' => $input['adress'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
