<?php
    class Product extends Db
    {
        public function getAllProducts()
        {
            // lấy ra 10 sp mới nhất
            //$sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT 0,10");
            // lấy ra sản phẩm bán chạy
            //$sql = self::$connection->prepare("SELECT * FROM `products` WHERE `feature` = 0");
            //$sql = self::$connection->prepare("SELECT * FROM `products` WHERE `id` = 10");
            $sql = self::$connection->prepare("SELECT * FROM `products`");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i",$id);  
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword){
        $sql=self::$connection->prepare("SELECT * FROM products WHERE 'name' LIKE ?");
        $keyword ="%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->excute();
        $items = array();
        $items =$sql->get_result()->fecth_all(MYSQLI_ASSOC);
        return items;
    }
}
?> 