<form method="post">
  <?php if (isset($item)): ?>
    <table>
      <tr><th>Name:</th><td><input type="text" name="name" value="<?=$item['name']?>"/></td></tr>
      <tr><th>Surname:</th><td><input type="text" name="surname" value="<?=$item['surname']?>" /></td></tr>
      <tr><th>Age:</th><td><input type="text" name="age" value="<?=$item['age']?>" /></td></tr>
      <tr><th>Address:</th><td><input type="text" name="address" value="<?=$item['address']?>" /></td></tr>
    </table>
    <input type="hidden" name="id" value="<?=$item['id']?>" />
  <?php else: ?>
    <table>
      <tr><th>Name:</th><td><input type="text" name="name" /></td></tr>
      <tr><th>Surname:</th><td><input type="text" name="surname" /></td></tr>
      <tr><th>Age:</th><td><input type="text" name="age" /></td></tr>
      <tr><th>Address:</th><td><input type="text" name="address" /></td></tr>
    </table>
  <?php endif; ?>
  <input type="submit" name="add" value="Send" />

</form>
