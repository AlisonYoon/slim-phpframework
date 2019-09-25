<?php


namespace Example\Models;


class StudentModel
{
    private $db;

    /**
     * StudentModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db) //PDO doesn't exist inside current Namespace. that's why for using back slash.
    {
        $this->db = $db;
    }


}