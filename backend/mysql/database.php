<?php
require_once("config.php");
class MySQLDatabase
{
    private $connection;
    public $last_query;
    private $real_escape_string_exists;
    private $db_name;
    private $number_try = 0;
    function __construct($db_name = NULL)
    {
        $this->db_name = $db_name;
        $this->open_connection();
        $this->real_escape_string_exists = function_exists("mysqli_real_escape_string");
    }
    public function open_connection()
    {
        if (is_null($this->db_name)) $this->db_name = DB_NAME;
        try {
            $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
            if (!$this->connection) {
                throw new Exception("Database connection failed" . mysqli_connect_error());
            } else {
                $db_select = mysqli_select_db($this->connection, $this->db_name);
                if (!$db_select) {
                    throw new Exception("Database connection failed: " . mysqli_connect_error());
                }
            }
        } catch (Exception $e) {
            /* Tenta novamente connectar ao banco*/
            sleep(1);
            if ($this->number_try < 5) {
                $this->number_try++;
                $this->open_connection();
            } else {
                $this->error_render($e->getMessage());
            }
        }
    }
    private function error_render($error)
    {
        // error file
        $log_file = './logs/database_error.log';
        // URl
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        $url = $protocol . $host . $uri;
        // MESSAGE
        $string = "[" . date("Y-m-d H:i:s") . "] $error on $url\n$this->last_query \n\n";
        file_put_contents($log_file, $string, FILE_APPEND);
        die("Erro interno do servidor. Por favor, tente novamente mais tarde.");
    }
    public function close_connection()
    {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
    public function query($sql)
    {
        $this->last_query = $sql;
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }
    public function escape_value($value)
    {
        $value = mysqli_real_escape_string($this->connection, $value);
        return $value;
    }
    // "database-neutral" methods
    public function fetch_array($result_set)
    {
        return mysqli_fetch_array($result_set);
    }
    public function fetch_object($result_set)
    {
        return mysqli_fetch_object($result_set);
    }
    public function num_rows($result_set)
    {
        return (!$result_set) ? 0 : mysqli_num_rows($result_set);
    }
    public function insert_id()
    {
        // get the last id inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }
    public function affected_rows()
    {
        return mysqli_affected_rows($this->connection);
    }
    private function confirm_query($result)
    {
        if (!$result) {
            $this->error_render("Database query failed: " . mysqli_error($this->connection));
        }
    }
    public function getDBName()
    {
        return $this->db_name;
    }
}
$database = new MySQLDatabase();
