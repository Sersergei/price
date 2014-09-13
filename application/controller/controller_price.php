<?php
class Controller_price extends Controller
{
    function action_index()
    {
        if (isset($_POST['del'])) { //проверяем нажата ли кнопка удаления
            //удаляем пост
            $del = new Model_price;
            $del->product_del($_POST['del']);
            //удаляем картинку
            $image = "image/" . $_POST['image'];
            unlink($image);
        }
        if (isset($_POST['send'])) { // Проверка на отправку формы добавления записи


            switch ($_FILES['image']['type'])
                //проверка загружаемого файла(на то что он картинка)
                {
                case 'image/jpeg':
                    $ext = 'jpg';
                    break;
                case 'image/gif':
                    $ext = 'gif';
                    break;
                case 'image/png':
                    $ext = 'png';
                    break;
                default:
                    $ext = '';
                    break;
            }
            if ($ext) {
                $image = microtime() . "." . $ext;
                $uploadfile = "image/" . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
                if (isset($_POST[name]))
                    $name = $_POST[name] or die("Вы не ввели имя");
                if (isset($_POST[price]))
                    $price = $_POST[price] or die("Вы не ввели цену");
                if (isset($_POST[descr]))
                    $descr = $_POST[descr] or die("Вы не ввели описание");
                $add = new Model_price; //
                $add->product_add($name, $price, $descr, $image);
            } else {
                die("Вы не выбрали файл или он имеет неправильный формат");
            }


        }

        //выборка всех записей и вывод
        $result = new Model_price;
        $result = $result->price_view();
        $this->view->generate('main_view.php', 'template_view.php', $result);
    }
    function action_update()
    {
        $result = new Model_price;
        $result->price_update($_POST['id'], $_POST['price']);

    }
}
?>