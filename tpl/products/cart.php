<html>
<head>
</head>
<body>
  <table>
  <?php foreach ($list as $item): ?>
      <tr>
        <td><?=$item->name?></td>
        <td><input value="<?=$_SESSION['cartItems'][$item->id]?>" /></td>
        <td><a href="\?c=products&a=del&id=<?=$item->id?>">X</a>
      </tr>
  <?php endforeach; ?>
</table>
<a href="\?c=products">&larr; list</a>
</body>
</html>
