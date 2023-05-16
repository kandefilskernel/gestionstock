class DB{
    private static $pdo;

    public function connection(){
        if(isset(self::$pdo)) {

            try{
                self::$pdo = new PDO ("mysql:host="91.216.107.183";dbname=istam1531505",istam1531505,6xka7e0o6p);
                echo "Conncetion successfully";

            }catch(PDOException $e){
                echo "Conection Failed............".$e->getMessage();
            }
        }
        return self::$pdo;
    }
    public static function prepare($sql){ // own prepare() method
        return self::connection()->prepare($sql); //pdo prepare()
    }
}
