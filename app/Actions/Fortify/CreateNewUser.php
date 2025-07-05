<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:male,female,other'],
            'phone' => ['required', 'string', 'max:20'],
            'tax_code' => ['required', 'string', 'size:16', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted'] : [],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'birth_date' => $input['birth_date'],
            'gender' => $input['gender'],
            'phone' => $input['phone'],
            'tax_code' => $input['tax_code'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<string>
     */
    protected function passwordRules()
    {
        return ['required', 'string', 'min:8', 'confirmed'];
    }
}