<?php

namespace Core;

class Authenticator
{

    public function attempt($email, $password): bool {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if( $user ) {

            if(password_verify($password, $user['password'])) {
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

        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();

        //create a cookie that immediately expires since there is not a straightforward to clear the cookies
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}