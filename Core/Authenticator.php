<?php

namespace Core;

class Authenticator
{

    public function attempt($email, $password): bool {

        //Database::class returns the actual namespace: Core\Database;
        $db = App::resolve(Database::class);

        $user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if( $user ) {

            //check if the given password matches the given hash that is stored in the database
            if( password_verify($password, $user['password']) ) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function login($user): void {
        $_SESSION['has_logged_in'] = true;
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout(): void {
        Session::destroy();
    }

}