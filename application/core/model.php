<?php
class Model
{
    //Класс модели. Осуществляет подключение к базе данных.
    public function db()
    {
        include_once 'config_db.php';
        try {
            $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
            $db = new PDO($connect_str, DB_USER, DB_PASS);
        }
        catch (PDOException $e) {
          //  echo ("Error!: " . $e->getMessage());
        }
        return $db;
    }
    protected function validation($valid)
    {
        $valid = trim($valid);
        $valid = strip_tags($valid);
        return $valid;

    }
    protected function validation_price($valid)
    {
        $valid = $this->validation($valid);
        $valid = str_replace(",", ".", $valid);
        $valid = (float)$valid;
        return $valid;
    }
}
?>