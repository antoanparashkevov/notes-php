<?php

namespace Core;

class Session
{
    //put a property to the $_SESSION super global
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    //get a value from a given key. First, search into the _flash associative array and then inside the entire $_SESSION super global
    public static function get($key, $default = null)
    {
      return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;

    }

    //returns a bool indicating whether we have the given key
    public static function has($key): bool
    {
        //cast to boolean with (bool). For ex: (bool) 'Hello' will cast to bool(true)
        return (bool)static::get($key);
    }

    //put a property to the _flash associative array
    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    //remove the _flash associative array
    public static function unflash(): void
    {
        unset($_SESSION['_flash']);
    }

    //remove the entire session
    public static function flush(): void
    {
        $_SESSION = [];
    }

    //delete the entire session + destroys all data registered to a session (session_destroy()) + set an invalid cookie that replaces the valid one. In that way we remove the cookie
    public static function destroy(): void
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();

        //create a cookie that immediately expires since there is not a straightforward to clear the cookies
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}