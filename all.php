<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<table>
    <tr>
        <th>Номер</th>
        <th>Название</th>
    </tr>

    <?php foreach ($this->data as $name):?>
        <tr>
    <?php foreach ($name as $value):?>
        <td><?php echo $value ?></td>
            <?php endforeach?>
            </tr>
    <?php endforeach ?>
    </tr>
</table>

<hr width="100%">


<form action= "index.php?ctrl=newsControler&action=insertREC" method="post" enctype="multipart/form-data">
    <p> Название статьи</p>
    <input type="text" name="namestr" />
    <input type="submit" name="action" value="Добавить статью" />
</form>

<hr width="100%">


<form action= "index.php?ctrl=newsControler&action=findID" method="post" enctype="multipart/form-data">
    <p> Выбрать статью</p>
    <input type="text" name="strnum" />
    <input type="submit" name="action" value="Выберите статью" />
</form>

<hr width="100%">


<form action= "index.php?ctrl=newsControler&action=deleteREC" method="post" enctype="multipart/form-data">
    <p> Выбрать статью для удаления</p>
    <input type="text" name="num" />
    <input type="submit" name="action" value="Удалить" />
</form>

<hr width="100%">

<form action= "index.php?ctrl=newsControler&action=modifyREC" method="post" enctype="multipart/form-data">
    <p> Измененить название статьи</p>
    <p>Новое название</p>
    <input type="text" name="newname" />
    <br>
    <input type="number" name="num" />
    <input type="submit" name="action" value="My_Modyfy" />
</form>
<footer>
   
</footer>