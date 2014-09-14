<?php
class Model_price extends Model
{

    function price_view()
    {
        //ищем все записи в БД
        $result = $this->db()->query("SELECT * FROM `products`");
        return $result;
    }
    function product_add($name, $price, $description, $image)
    {
        //убираем все ненужное и проверяем на пустоту
        $name = $this->validation($name);
        if ($name == "")
            die("Вы не корректно ввели имя");
        $description = $this->validation($description);
        if ($description == "")
            die("Вы не корректно ввели описание");
        $price = $this->validation_price($price);
        if ($price == "" or $price <= 0)
            die("Вы не корректно ввели цену");
        //записываем данные в БД
        $result = $this->db()->prepare("INSERT INTO `products`( `name`, `price`, `description`, `image`) VALUES (:name,:price,:description,:image)");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':image', $image);
        $result->execute();

    }
    function product_del($id)
    {
        //удаляем запись
        $result = $this->db()->prepare("DELETE FROM `products` WHERE `id`=:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

    }
    function price_update($id, $price)
    {
        //проверяем цену
        $price = $this->validation_price($price);
         if ($price == "" or $price<=0)
            die("Вы не корректно ввели цену");

        //вносим изменение цены
        $result = $this->db()->prepare("UPDATE `products` SET `price`=:price WHERE `id`=:id");
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }

}
?>