<?php
class EmployeeType  extends  Eloquent{
    public $table ='tbl_employeetype';

    /*
     * Get Lost for Employee Type
     *
     * @return array
     */

    public function getTypeLost(){
        $data = [];
        try {
            $result = $this->db->prepare(
                "select id, name
            from $this->table"
            );

            $result->execute();

            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $data [] = $row ;
            }
        } catch (PDOException $e) {
            echo 'ERROR: '.$e->getMessage();
        }

        return $data;

    }
}