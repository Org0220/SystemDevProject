<?php

class DbDump extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_tables()
    {
        $this->query('SHOW tables');
        return $this->getResultSet();
    }

    public function get_table_records($table_name)
    {
        $this->query('SELECT * FROM ' . $table_name);
        return $this->getResultSet();
    }

    public function get_table_column_names($table_name)
    {
        $this->query('DESCRIBE ' . $table_name);
        return $this->getResultSet();
    }
}