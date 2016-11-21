<html>
<head>
</head>
<body>
  <h1>Личный кабинет</h1>

  <table>
    <tr>
      <th>Id</th>
      <td><?=$user->id?></td>
    </tr>
    <tr>
      <th>Login</th>
      <td><?=$user->login?></td>
    </tr>
  </table>
  <a href="">Edit</a> <a href="/?c=user&a=logout">Exit</a>
</body>
</html>
