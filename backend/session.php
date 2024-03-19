<?

namespace Backend\Session;


/*Session Handler */

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function id()
    {
        return session_id();
    }

    public static function regenerate()
    {
        session_regenerate_id();
    }

    public static function stop()
    {
        session_write_close();
    }

    public static function isStarted()
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public static function isClosed()
    {
        return session_status() === PHP_SESSION_NONE;
    }

    public static function status()
    {
        return session_status();
    }
}
