<?php
    include_once MODELS_PATH . '/database.php';

    class User {
        public $email;
        public $password;

        public function __construct($email, $password) {
            $this->email = $email;
            $this->password = $password;
        }

        public static function getAll()
        {
            $sql = "SELECT usuario FROM usuarios WHERE activo = 1";
    
            try
            {
                $recordset = executeQuery($sql);
                return $recordset;
            }
            catch(Exception $e)
            {
                // Implementacion del codigo que maneja el error
            }
    
            return NULL;
        }
        
        public static function delete($email)
        {
            
            $sql = "UPDATE usuarios SET activo = 0 WHERE usuario = '$email'";
    
            try
            {
                $result = executeQuery($sql);
                return $result;
            }
            catch(Exception $e)
            {
                // Implementacion del codigo que maneja el error
            }
            return false;
        }


    }

    class Identity extends User {
        public function __construct($email, $password) {
            parent::__construct($email, $password);
        }

        public function validate() { 
            $sql = "SELECT 1 FROM usuarios WHERE usuario = '$this->email' AND passwor = '$this->password'";

            $times = 0;
            while ($times < 3) {
                try
                {
                    $recordset = executeQuery($sql);
                    if (mysqli_num_rows($recordset) > 0) 
                    {
                        return true;
                    }
                }
                catch(Exception $e)
                {
                    $times = $times + 1;
                    $sleep = rand(300, 800) * 1000;
                    usleep($sleep);
                }
            }
            
            return false;
        }

        public function register() {
            $sql = "INSERT INTO usuarios (usuario, password, activo) VALUES ('$this->email', '$this->password', 1);";

            try
            {
                $result = executeQuery($sql);
                return $result;
            }
            catch(Exception $e)
            {
                // Implementacion del codigo que maneja el error
            }
    
            return false;
        }
    }
?>