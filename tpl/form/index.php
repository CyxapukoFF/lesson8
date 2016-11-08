<table>
  <tr><th>Id</th><th>Name</th><th>Surname</th><th>Age</th><th>Address</th><th></th></tr>
  <?php foreach ($list as $item): ?>
    <tr>
      <td><?=$item['id']?></td>
      <td><?=$item['name']?></td>
      <td><?=$item['surname']?></td>
      <td><?=$item['age']?></td>
      <td><?=$item['address']?></td>
      <td>
        <a href="?c=form&a=edit&id=<?=$item['id']?>">Edit</a>
        <a href="?c=form&a=delete&id=<?=$item['id']?>">Del</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<a href="/?c=form&a=add">Add</a>
