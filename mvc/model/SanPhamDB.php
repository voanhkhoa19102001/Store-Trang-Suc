<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
//Model
class SanPhamDB extends ConnectionDB
{
    //Lay sanpham
    function getProductById($productId)
    {
        $qry = "SELECT * FROM `trangsuc` WHERE `MASP`='$productId';";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $qry));
    }
    //Lay tat ca sanpham
    function getAllProduct($isDisable = false)
    {
        $qry = "SELECT * FROM `trangsuc`;";
        $data = array();
        $rs = mysqli_query($this->conn, $qry);
        while ($row = mysqli_fetch_assoc($rs)) {
            $data[] = $row;
        }
        return $data;
    }

    //Lay tat ca sanpham
    function getProductRandom($number = 5)
    {
        $data = $this->getAllProduct();
        $result = array();
        //Filter product
        while($number > 0 && count($data) > 0){
            $rdKey = array_rand($data);
            if($data[$rdKey]['TRANGTHAI'] == 1){
                $result[] = $data[$rdKey];
                $number--;
            }
            else{
                unset($data[$rdKey]);
            }
        }
        return $result;
       
    }
    //Tao ma sanpham tiep theo
    function createNextProductId()
    {
        $data = $this->getAllProduct();
        $lastBillId = array('MASP'=>'SP00');
        foreach($data as $value){
            $currentId = (int)substr($lastBillId['MASP'], 2);
            $id = (int)substr($value['MASP'], 2);
            if($id > $currentId){
                $lastBillId = $value;
            }
        }
        //$lastBillId = empty($data) ? array() : end($data);
        
        if (empty($lastBillId)) {
            return 'SP01';
        }
        $nextId = (int)substr($lastBillId['MASP'], 2) + 1;
        
        while (strlen($nextId) < 2) {
            $nextId = '0' . $nextId;
        }

        $newId = substr($lastBillId['MASP'], 0, 2) . $nextId;
        
        return substr($lastBillId['MASP'], 0, 2) . $nextId;
    }
    //Lay sanpham theo maloai
    function getProductByTypeId($typeId)
    {
        $qry = "SELECT * FROM `trangsuc`;";
        $data = array();
        $rs = mysqli_query($this->conn, $qry);
        while ($row = mysqli_fetch_assoc($rs)) {
            if($row['MALOAI'] == $typeId){
                $data[] = $row;
            }
        }
        return $data;
    }

    //Them san pham moi
    function addNewProduct($productArr)
    {
        $qry = "INSERT INTO `trangsuc`(`MASP`, `TENSP`, `MALOAI`, `GIA`, `SOLUONG`, `HINHANH`, `TRANGTHAI`, `PHANTRAMGIAM`) VALUES ";
        foreach ($productArr as $value) {
            $qry .= "('$value[MASP]','$value[TENSP]','$value[MALOAI]',$value[GIA],$value[SOLUONG],'$value[HINHANH]',true,0),";
        }
        $qry = substr($qry, 0, strlen($qry) - 1).';';

        if (mysqli_multi_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat thong tin san pham
    function updateInformationProduct($product)
    {
        $qry = "UPDATE `trangsuc` SET `TENSP`='$product[TENSP]',`MALOAI`='$product[MALOAI]',`GIA`=$product[GIA],`HINHANH`='$product[HINHANH]',`PHANTRAMGIAM`=$product[PHANTRAMGIAM] WHERE `MASP`='$product[MASP]';";

        if (mysqli_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat so luong san pham
    function updateNumberListProduct($productArr)
    {
        $qry = "";

        foreach ($productArr as $value) {
            $currentProduct = $this->getProductById($value['MASP']);
            $qry .= "UPDATE `trangsuc` SET `SOLUONG`=(-$value[amount]+$currentProduct[SOLUONG]) WHERE `MASP`='$value[MASP]';";
        }
        if (mysqli_multi_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat so luong san pham
    function updateNumberListProduct_Receipt($productArr)
    {
        $qry = "";

        foreach ($productArr as $value) {
            $currentProduct = $this->getProductById($value['MASP']);
            $qry .= "UPDATE `trangsuc` SET `SOLUONG`=($value[SOLUONG]+$currentProduct[SOLUONG]) WHERE `MASP`='$value[MASP]';";
        }
        if (mysqli_multi_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Xoa san pham
    function disableProductStatus($idProduct)
    {
        $qry = "UPDATE `trangsuc` SET `TRANGTHAI`=false WHERE `MASP` = '$idProduct';";
        if (mysqli_query($this->conn, $qry)) {
            return true;
        }
        return false;
    }
    //Cap nhat so luong san pham
    function updateNumberOfProduct($productId, $number)
    {
    }

    function uploadImage($data, $time)
    {
        $directory = "./public/image/HINHANH/";
        //return $data;
        if (move_uploaded_file($data['tmp_name'], $directory . $data['name'])) {
            return true;
        }
        return false;
    }

    function getSaleProduct(){
        $data = $this->getAllProduct();
        $result = array();
        foreach($data as $value){
            if($value['PHANTRAMGIAM'] != 0){
                $result[] = $value;
            }
        }
        return $result;
    }

    function exportExcel()
    {
        $result = array();
        $result['NAME'] = '';
        $result['ERROR'] = 0;

        try {
            //Data
            $data = $this->getAllProduct();
            //First sheet
            $objPHPExcel = new Spreadsheet();
            $drawing = new Drawing();

            // Add new sheet
            $objWorkSheet = $objPHPExcel->createSheet(0); //Setting index when creating
            $objWorkSheet->setTitle("Sản Phẩm");
            $numRow = 1;

            $objWorkSheet
                ->setCellValue('A' . $numRow, 'Mã Sản Phẩm')
                ->setCellValue('B' . $numRow, 'Tên Sản Phẩm')
                ->setCellValue('C' . $numRow, 'Mã Loại')
                ->setCellValue('D' . $numRow, 'Giá')
                ->setCellValue('E' . $numRow, 'Số Lượng')
                ->setCellValue('F' . $numRow, 'Trạng Thái')
                ->setCellValue('G' . $numRow, '% Giảm');

            foreach ($data as $value) {
                ++$numRow;
                $objWorkSheet
                    ->setCellValue('A' . $numRow, $value['MASP'])
                    ->setCellValue('B' . $numRow, $value['TENSP'])
                    ->setCellValue('C' . $numRow, $value['MALOAI'])
                    ->setCellValue('D' . $numRow, $value['GIA'])
                    ->setCellValue('E' . $numRow, $value['SOLUONG'])
                    ->setCellValue('F' . $numRow, ($value['TRANGTHAI'] == 1 ? " Còn Bán" : "Đã Xóa"))
                    ->setCellValue('G' . $numRow, $value['PHANTRAMGIAM']." %");  
            }
            
            $objPHPExcel->setActiveSheetIndex(0);
            $objWriter = new Xlsx($objPHPExcel);
            $filename = 'Product' . date("dmY_His") . '.xlsx';
            $objWriter->save('./public/excel/' . $filename);
            $result['NAME'] = '/CuaHangTrangSuc/public/excel/' . $filename;
        } catch (Exception $e) {
            $result['ERROR'] = $e->getMessage();
        }
        return $result;
    }
}
