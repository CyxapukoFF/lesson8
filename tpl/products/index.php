<html>
<head>
</head>
<body>
  <ul>
    <?php foreach ($list as $item): ?>
      <li>
        <div>
          <h3><?=$item->name?></h3>
          <span><?=$item->price?></span>
          <a href="/?c=products&a=add&id=<?=$item->id?>">Add to cart</a>
        </div>
      </li>
  <?php endforeach; ?>
  </ul>


  <a href="\?c=products&a=cart">Cart</a>
</body>
</html>
