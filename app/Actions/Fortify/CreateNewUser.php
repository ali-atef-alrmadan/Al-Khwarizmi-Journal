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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'birth_date' => 'required|date|before:-18 years',
            'prefix' => ['required', 'string', 'nullable'],
            'degree' => ['required', 'string', 'nullable'],
            'country' => ['required', 'string', 'nullable'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'prefix' => $input['prefix'],
            'name' => $input['name'],
            'degree' => $input['degree'],
            'email' => $input['email'],
            'birth_date' => $input['birth_date'],
            'country' => $input['country'],
            'Institution' => isset($input['Institution']) ? $input['Institution'] : 'فارغ',
            'password' => Hash::make($input['password']),
        ]);
    }
}
