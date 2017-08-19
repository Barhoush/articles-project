<?php


class task_6 {
    protected $_conn;

    function __construct($_db)
    {
        $this->_conn  =   $_db;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->_conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn)
    {
        $this->_conn = $conn;
    }

    function execute(){
        $factors    =   $this->all();
        foreach ($factors   as  $factor){
            $newPrice   =   ($factor ->  price   / $factor   ->  factor)    *   2.5;
            if($newPrice    <=  0.01){
                $newPrice   =   1.0;
            }
            $factor ->  price   =   $newPrice;
            if(!$this    ->  save($factor->id,  $factor)){
                break;
            }
            echo 'updating  '   .   $factor->id .   '</br>';
        }
    }
    //get all factors
    function all(){
        $select =   mysqli_query($this->getConn(),"select * from factors");
        $records    =   [];
        while ($row =   mysqli_fetch_object($select)){
            $records[]  =   $row;
        }

        return $records;
    }

    //update a factor
    function save($id,  $data){
        $sql    =   'update factors set ';
        $i  =   0;
        $data = json_decode(json_encode($data), True);
        $data['updated_at'] =   date('Y-m-d h:m:s');
        foreach ($data  as  $col    =>$row){
            $currentRow =   "$col"    .  "='$row'";
            $sql    .=  $currentRow;
            if($i++ <   count($data)    -   1){
                $sql    .=  ',  ';
            }
        }
        $sql    .=  '   WHERE   id  =   '.$id;
        if (mysqli_query($this->getConn(), $sql)) {
            return true;
        }
        return false;
    }
}

ini_set("display_errors",1);
error_reporting(E_ERROR);
$connection    =   mysqli_connect("localhost","root","",  "articles_barhoush");
$job    =   new task_6($connection);
$job    ->  execute();

?>