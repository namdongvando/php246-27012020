<?php

namespace Model;

class DB
{
    private static $DB;
    public static $tableName;
    function __construct()
    {
        global $mysqli;
        if (self::$DB == null)
            self::$DB = $mysqli;
    }

    public function DeleteDB($where)
    {
        $tableName = self::$tableName;
        $sql = "DELETE FROM `{$tableName}` WHERE {$where}";
        self::$DB->query($sql);
        return self::$DB;
    }

    public function SelectRow($where, $col = [])
    {
        $tableName = self::$tableName;
        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        if ($col) {
            $strcol = implode("`,`", $col);
            $sql = "SELECT `{$strcol}` FROM `{$tableName}` WHERE {$where}";
        }
        return $this->GetRow($sql);
    }
    public function Select($where, $col = [])
    {
        $tableName = self::$tableName;
        $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        if ($col) {
            $strcol = implode("`,`", $col);
            $sql = "SELECT `{$strcol}` FROM `{$tableName}` WHERE {$where}";
        }
        return $this->GetRows($sql);
    }

    public function Update($model, $where = null)
    {
        $strsql = "";
        foreach ($model as $col => $val) {
            //$strsql .= "`{$col}`='{$val}',";
            $strsql =  $strsql . "`{$col}`='{$val}',";
        }
        $tableName = self::$tableName;
        $strsql = substr($strsql, 0, -1);
        $sql = "UPDATE `{$tableName}` 
        SET  {$strsql}  WHERE {$where}";
        self::$DB->query($sql);
        return self::$DB;
    }

    function Insert($model)
    {
        $tableName = self::$tableName;
        $col = array_keys($model);
        $val = array_values($model);
        $colstr = implode("`,`", $col);
        $valstr = implode("','", $val);

        $sql = "INSERT INTO 
        `{$tableName}`
        (`{$colstr}`) 
        VALUES ('{$valstr}')";
        self::$DB->query($sql);
        return self::$DB;
    }

    function GetRows($sql = null)
    {
        $res =  self::$DB->query($sql);
        if ($res == null) {
            return null;
        }
        $a = [];
        while ($row = $res->fetch_assoc()) {
            $a[] = $row;
        }
        return $a;
    }
    function GetRow($sql = null)
    {
        $res =  self::$DB->query($sql);
        if ($res == null) {
            return null;
        }
        return $res->fetch_assoc();
    }

    public function SelectPT($where,$indexPage,$numberRow,&$total)
    {
        $res = $this->Select($where);
        $total = count($res);
        // tính vị trí lấy dòng
        $indexPage = ($indexPage-1) * $numberRow;
        $indexPage = max($indexPage,0);
        $where =  "{$where} limit {$indexPage},{$numberRow}";
        return $this->Select($where);
    }

}
