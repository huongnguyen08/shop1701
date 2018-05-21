<?php

require 'DBConnect.php';
class CheckoutModel extends DBConnect{

    function saveCustomer($name, $email, $gender, $address, $phone){
        $sql = "INSERT INTO customers(name,email,gender,address,phone)
                VALUES (?,?,?,?,?)";
        $option = [$name,$email,$gender,$address, $phone];
        $check = $this->executeQuery($sql,$option);
        return $check ? $this->getLastId() : false;
    }

    function saveBill($idCustomer, $dateOrder, $total, $promtPrice,$paymentMethod, $note){
        $sql = "INSERT INTO bills(id_customer, date_order, total, promt_price, payment_method, note)
                VALUES ($idCustomer,'$dateOrder', $total, $promtPrice,'$paymentMethod', '$note')";
        $check = $this->executeQuery($sql);
        return $check ? $this->getLastId() : false;
    }

    function saveBillDetail($idBill, $idProduct,$qty, $price){
        $sql = "INSERT INTO bill_detail(id_bill, id_product, quantity, price)
                VALUES ($idBill, $idProduct,$qty, $price)";
        return $this->executeQuery($sql);
    }
} 
?>