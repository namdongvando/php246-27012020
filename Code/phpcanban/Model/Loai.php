<?php

namespace Model;

class Loai extends DB
{
    public $MaLoai;
    public $TenLoai;
    public $TenKhongDau;
    public $SoLuongSanPham;
    public $STT;
    public $ThongSoKyThuat;
    public $Lang;
    public $AnHien;

    /**
     * Class constructor.
     */
    public function __construct($loai = null)
    {
        DB::$tableName = "nn_loai";
        parent::__construct();
        if($loai){
            $this->MaLoai = !empty($loai["MaLoai"]) ? $loai["MaLoai"] : null;
            $this->TenLoai = !empty($loai["TenLoai"]) ? $loai["TenLoai"] : null;
            $this->TenKhongDau = !empty($loai["TenKhongDau"]) ? $loai["TenKhongDau"] : null;
            $this->SoLuongSanPham = !empty($loai["SoLuongSanPham"]) ? $loai["SoLuongSanPham"] : null;
            $this->STT = !empty($loai["STT"]) ? $loai["STT"] : null;
            $this->ThongSoKyThuat = !empty($loai["ThongSoKyThuat"]) ? $loai["ThongSoKyThuat"] : null;
            $this->Lang = !empty($loai["Lang"]) ? $loai["Lang"] : null;
            $this->AnHien = !empty($loai["AnHien"]) ? $loai["AnHien"] : null;
        }
        
    }

    
    public function Post($model)
    {
        return $this->Insert($model);
    }
    public function Put($model)
    {
        $where ="`MaLoai` = '{$model["MaLoai"]}'";
        return $this->Update($model,$where);
    }
    public function Delete($id)
    {
        $where ="`MaLoai` = '{$id}'";
        return $this->DeleteDB($where);   
    }

    public function GetById($Ma)
    {
        $where = "`MaLoai` ={$Ma}";
        return $this->SelectRow($where);
    }    

    public function GetAllPT($name,$indexPage,$numberRow,&$total)
    {
        $where = " `MaLoai` like '%{$name}%' or `TenLoai` like '%{$name}%' ";
        return $this->SelectPT($where,$indexPage,$numberRow,$total);
    }
}
