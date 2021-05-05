<?php

namespace Model;

class Menu extends DB
{
    public $Ma;
    public $Ten;
    public $Link;
    public $HinhAnh;
    public $STT;
    public $HienThi;
    public $ViTri;
    public $Nhom;
    public $CapCha;
    public $GhiChu;

    /**
     * Class constructor.
     */
    function __construct($menu = null)
    {
        DB::$tableName = "nn_menu";
        parent::__construct();
        if ($menu != null) {

            $this->Ma = !empty($menu["Ma"]) ? $menu["Ma"] : null;
            $this->Ten = !empty($menu["Ten"]) ? $menu["Ten"] : null;
            $this->Link = !empty($menu["Link"]) ? $menu["Link"] : null;
            $this->HinhAnh = !empty($menu["HinhAnh"]) ? $menu["HinhAnh"] : null;
            $this->STT = !empty($menu["STT"]) ? $menu["STT"] : null;
            $this->HienThi = !empty($menu["HienThi"]) ? $menu["HienThi"] : null;
            $this->ViTri = !empty($menu["ViTri"]) ? $menu["ViTri"] : null;
            $this->Nhom = !empty($menu["Nhom"]) ? $menu["Nhom"] : null;
            $this->CapCha = !empty($menu["CapCha"]) ? $menu["CapCha"] : null;
            $this->GhiChu = !empty($menu["GhiChu"]) ? $menu["GhiChu"] : null;
        }
    }

    public function CapCha()
    {
        return new Menu($this->GetById($this->CapCha));
    }
    public function Post($modelMenu)
    {
        return $this->Insert($modelMenu);
    }
    public function Put($modelMenu)
    {
        $where ="`Ma` = '{$modelMenu["Ma"]}'";
        return $this->Update($modelMenu,$where);
    }
    public function Delete($id)
    {
        $where ="`Ma` = '{$id}'";
        return $this->DeleteDB($where);   
    }

    public function GetById($Ma)
    {
        $where = "`Ma` ={$Ma}";
        return $this->SelectRow($where);
    }    

    public function GetAllPT($name,$indexPage,$numberRow,&$total)
    {
        $where = " `Ma` like '%{$name}%' or `Ten` like '%{$name}%' ";
        return $this->SelectPT($where,$indexPage,$numberRow,$total);
    }


}
