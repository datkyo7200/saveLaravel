<?php
require_once "config.php";
 class DB{
     public $conn;

    public function __construct() {
        $this->connection();
    }
    //connnect
    function connection(){

        $this->conn= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->conn-> connect_error){
            die("Kết nối db không thành công".$this->conn->connect_error);
        }
        else{
            // echo"Kết nối db thành công";    
        }
     }
    function escape_string($str)
     {
        return $this-> conn -> real_escape_string($str);
     }
     //run query
    function query($sql){
        return $this->conn->query($sql);
    }
    //Insert
    function insert($table_name,$data){
        
        foreach ($data as $k => $v) {   
            $list_field[] = "{$k}";
            $list_value[] = "'{$this->escape_string($v)}'";
        }

        $list_field = implode(',',$list_field);
        $list_value = implode(',',$list_value);

        $sql = "INSERT INTO {$table_name}({$list_field}) VALUES ({$list_value})";
        // echo $sql;
        if ($this-> query($sql) == TRUE) {
            return $this-> conn -> insert_id; 
        } else {
            echo "Lỗi:".$this-> conn-> error;
        }
    }
    //lấy dữ liêu
    function get($table_name,$field = array(),$where = "")
    {
        $field = !empty($field)?implode(',',$field):"*";
        $where = !empty($where)?"WHERE {$where}":"";
        $sql ="SELECT {$field} FROM {$table_name} {$where}";
        // echo $sql;
        $result =  $this->query($sql);
        if($result->num_rows >0){
            $data = array();
            while($row = $result -> fetch_assoc()){
                $data[] = $row;
            }
            if(count($data)>1){
                return $data;
            }else{            
                return $data[0];
            }

        }else{
            echo "Không tìm thấy bản ghi nào";
        }
    }
    //Update db
    function update($table_name,$data = array(),$where){
        $data_insert = array();
        foreach ($data as $k => $v) {
            $data_insert[] = "{$k} = '{$v}'";
        }
        $data_insert = implode(',',$data_insert);
        $where = !empty($where)?"WHERE {$where}":"";
        $sql ="UPDATE {$table_name} SET {$data_insert} {$where} ";
        // echo $sql;
        if($this->conn ->query($sql) == TRUE){
            echo " Cập nhật thành công";
        }
        else{
            echo  "Lỗi: ".$this->conn->error;
        }
    }
    //Delete db
    function delete($table_name,$where="")
    {
        $where = !empty($where)?"WHERE {$where}":"";
        $sql ="DELETE FROM {$table_name} {$where}";
        
        // echo $sql;
        if($this->query($sql) ===TRUE){
            echo " Đã xóa thành công";
        }
        else{
            echo  "Lỗi: ".$this->conn->error;
        }
    }
 }

 $db = new DB;
//Thêm bản ghi
    //  $data = array(
    //     "username"=>'nguyennhatthien',
    //     "password" =>md5('dat123'),
    //     );
    //  $db -> update('users',$data);
// lấy bản ghi
    //  $user = $db ->get('users','','id=1');
    //  echo"<pre>";
    //  print_r($user);
    //  echo"</pre>";
    //  echo $user["username"];
// Cập nhật bản ghi
    //  $data = array(
    //     "username"=>'nguyennhatthien',
    //     "password" =>md5('dat123'),
    //     );   
    //  $db -> update('users',$data,"id=2");
//xóa bản ghi
     $db -> delete('users',"id=4");
 ?>