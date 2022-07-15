<table border="1px solid black">
    <tr>
        <td>Тег</td>
        <td>Сколько раз встречается</td>
    </tr>
    <?php foreach ($parsedElements as $element => $count):?>
    <tr>
        <td><?= $element ?></td>
        <td><?= $count ?></td>
    </tr>
    <?php endforeach; ?>
</table>