<?php

namespace core\database;

use PDO;
class QueryBuilder
{
    /** @var  mysqli */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert($table, array $data)
    {
        $keys = array_keys($data);
        // INSERT INTO %s (%s) VALUES ('%s')
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', $keys),
            "'" . implode("', '", $data) . "'"
        );
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);

    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM $table";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, array $where)
    {


        $sql = sprintf(
            "UPDATE %s SET complete = 1 WHERE id IN (%s)",
            $table,
            "'" . implode("', '", $where) . "'"

        );
        return $this->db->query($sql);

    }

    public function del($table, array $where)
    {
        $sql = sprintf(
            "DELETE FROM %s WHERE id IN (%s)",
            $table,
            "'" . implode("', '", $where) . "'"

        );
        return $this->db->query($sql);
    }
}

/*     public function delete($table, array $fields, $op='AND')
    {
        $keys = array_keys($fields);

        $sql = sprintf(
                'DELETE FROM %s WHERE %s',
            $table,
            implode(" = ? $op ", $keys) . ' = ? '
        );
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values($fields));
    }
    public function update($table, $setFields, $whereFields, $op='AND')
    {
        $keys = array_keys($whereFields);
        $set = implode(', ', array_map(function ($v, $k) {
            return sprintf("%s='%s'", $k, $v);
        }, array_values($setFields), array_keys($setFields)));
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s',
            $table,
            $set,
            implode(" = ? $op ", $keys) . ' = ? '
        );
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values($whereFields));
    }
}*/