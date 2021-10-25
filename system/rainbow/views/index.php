<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="<?php echo $Page->metaKeywords() ?>">
  <meta name="description" content="<?php echo $Page->metaDescription() ?>">
  <title><?php echo $Page->metaTitle() ?></title>
</head>
<body>
  <?php
    foreach($Page->items() as $item) {
      if($item->type()->name() == "post") {
        echo $item->title();
        echo $item->body();
      }
      echo "<hr>";
    }
  ?>
</body>
</html>