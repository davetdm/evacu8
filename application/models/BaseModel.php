<?php

/**
 * Description of BaseModel
 *
 * The model class get the data connection variable from the controller that uses it,
 * this ensures that, multiple Model classes can commit on the same database connection.
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class BaseModel extends CI_Model {

    /** @var array $fields - Table fields */
    protected $fields = null;

    /** @var string $table - The database table name */
    protected $table = null;

    /** @var connection $conx - The database connection */
    protected $conx = null;

    /**
     * Default constructor
     * @param string $table - Model table name
     */
    public function __construct($table = null) {
        parent::__construct();
        $this->set_table($table);
    }

    /**
     * Set/change a the current table
     */
    public function set_table($table = null){
        if (!is_null($table)){
            $this->table = $table;
        }
    }

    /**
     * Initialize the database object and fields
     * @param string  $conx - Database conection object
     */
    protected function set_conx($conx = null){
        if (!is_null($conx)){
            $this->conx = $conx;
            $this->set_fields();
        }
    }

    /**
     * set_fields - Get 
     *
     * @return array - An array of fields
     */
    public function set_fields(){
        $result = $this->db->query("describe {$this->table}");
        $results = $result->result_array();
        foreach ($results as $row) {
            if ($row["Key"] == 'PRI') {
                $this->fields['pk'] = $row["Field"];
            } else {
                $this->fields[] = $row["Field"];
            }
        }
    }

    /**
     * select - Get all records or by PK
     *
     * @param int $pk - Primary key
     * @return array - A 2D associative array containing records
     */
    public function select($pk = null){
        if (!is_null($pk)) {
            $this->db->select('*');
            $query = $this->db->get_where($this->table, [$this->fields['pk'] => $pk]);
           return $query->row();
        } else {
            $query = $this->db->get($this->table);
			return $query->result();
        }
    }

    /**
     * selectDeleted - Get all records or by PK by deleted flag
     *
     * @param int $pk - Primary key
     * @return array - A 2D associative array containing records
     */
    public function select_deleted($pk = null){
        if (!is_null($pk)) {
            $row = $this->select($pk);
            if ($row->deleted == FALSE){
                return $row;
            }
        } else {
            $result = [];
            $rows = $this->select();
            foreach($rows as $row){
                if ($row->deleted == TRUE) {continue;}
                $result[] = $row;
            }
            return $result;
        }
    }

    /**
     * insert - Insert a new record
     * @param array $data - Associative array containing information to insert
     * @return int - Return the last insert id
     */
    public function insert($data) {
        if (is_array($data)){
            $query = $this->db->insert($this->table, $data);
            if(!$query){
                $error = $this->db->error();
                throw new Exception("Model({$this->table}): " . $error['code'] . ' ' . $error['message']);
            }
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * lastInsertId - Returns last insert statement id
     * @return int - id
     */
    public function last_insert_id() {
        if(!is_null($this->db)){
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * update - Update records
     * @param array $data - Associative array containing information to update
     * @return int - Return the count of affected rows
     */
    public function update($data){
        if (is_array($data)){
            $this->db->where("{$this->fields['pk']}", $data[$this->fields['pk']]);
            $this->db->update($this->table, $data);
            return $this->db->affected_rows();
        }
        return false;
    }

    /**
     * delete - Delete records
     * @param int $pk - Primary key where to delete
     * @return int - Return the count of deleted records
     */
    public function delete($pk){
        if (!is_null($pk)){
            $this->db->where($this->fields['pk'], $pk);
            $this->db->delete($this->table);
            // if(!$query){
            //     $error = $this->db->error();
            //     throw new Exception("Model({$this->table}): " . $error['code'] . ' : ' . $error['message']);
            // }
            return $this->db->affected_rows();
        }
        return false;
    }
        
}