<?php
    $conn = mysqli_connect("localhost","root","","shop");
    mysqli_set_charset($conn,"utf8");
?>

<?php
    class Connect
    {
        //select or read data
        public function select($query)
        {
            $result = $this -> link ->query($query) or
            die ($this -> link ->error.__LINE__);
            if($result->num_rows>0){
                return $result;
            }else {
                return false;
            }
        }
        //insert data
        public function insert($query)
        {
            $insert_row = $this->link->query($query) or 
            die($this->link->error.__LINE__);
            if($insert_row){
                return $insert_row;
            }else{
                return false;
            }
        }   
        //update data
        public function update($query)
        {
            $update_row = $this->link->query($query) or
            die($this->link->error.__LINE__);
            if($update_row){
                return $update_row;
            }else{
                return false;
            }
        }
        //delete data
        public function delete($query)
        {
            $delete_row = $this->link->query($query) or
            die($this->link->error.__LINE__);
            if($delete_row){
                return $delete_row;
            }else{
                return false;
            }
        }
    }
?>