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
}
