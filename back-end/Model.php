<?php 


class Model{

    protected $data;
    protected static $table; 
    protected $params;


    public function __construct($table){
        self::$table = $table;
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }


    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    
    protected function create(){

        $data = (array)$this->data;

        $values = ":" . implode(", :", array_keys($data));
        $columns = implode(", ", array_keys($data));

        try{
            $stmt = Connection::getInstance()->prepare("INSERT INTO " . static::$table . " ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter_data($data));


            if(Connection::getInstance()->lastInsertId()){
                return true;
            }
            else{
                return false;
            }

        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    protected function select($terms = null, $params = null, $colums = "*"){

        if ($terms) {
                $this->query = "SELECT {$colums} FROM " . static::$table . " WHERE {$terms}";
                parse_str($params, $this->params);
                return $this;
            }

            $this->query = "SELECT {$colums} FROM " . static::$table;
            return $this;

        }



    protected function fetch($all = false){
        try {
            $stmt = Connection::getInstance()->prepare($this->query);
            $stmt->execute($this->params);
              if (!$stmt->rowCount()) {
                return null;
            }

             if ($all) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
            }
             return $stmt->fetchObject(static::class);
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    protected function update($terms, $params){
     
        $data = (array)$this->data;

        try {
            $dateSet = [];
            foreach ($data as $bind => $value) {
                $dateSet[] = "{$bind} = :{$bind}";
            }
            $dateSet = implode(", ", $dateSet);
            parse_str($params, $params);            

            $stmt = Connection::getInstance()->prepare("UPDATE " . static::$table . " SET {$dateSet} WHERE {$terms}");
            $s = $stmt->execute($this->filter_data(array_merge($data, $params)));
            return $s;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    
    }

    protected function delete($terms, $params){

        try {
            $stmt = Connection::getInstance()->prepare("DELETE FROM " . static::$table . " WHERE {$terms}");
            if ($params) {
                parse_str($params, $params);
                $stmt->execute($params);
            }

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    private function filter_data($data){
        $dataFilter = [];
        foreach ($data as $key => $value) {
            $dataFilter[$key] = filter_var($value, FILTER_SANITIZE_STRIPPED);
        }
        return $dataFilter;
    }


}