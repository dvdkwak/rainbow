<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rainbow | Admin | Page</title>
</head>
<body>
  <h1>Rainbow Page Control</h1>
  <?php include_once ROOT . "/system/rainbow/views/admin/components/menu.php"; ?>
  <!-- table with all pages with status != 2 -->
  <table>
    <thead>
      <th>#</th>
      <th>title/th>
      <th>uri</th>
      <th>status</th>
    </thead>
    <tbody>
      <?php
        foreach($data as $page) {
          echo "<row>";
            echo "<td><a href='" . DIRECTORY . "admin/page/" . $page->id() . "'>" . $page->id() . "</a></td>";
            echo "<td><a href='" . DIRECTORY . "admin/page/" . $page->id() . "'>" . $page->metaTitle() . "</a></td>";
            echo "<td><a href='" . DIRECTORY . "admin/page/" . $page->id() . "'>" . $page->uri() . "</a></td>";
            echo "<td><a href='" . DIRECTORY . "admin/page/" . $page->id() . "'>" . $page->status() . "</a></td>";
          echo "</row>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>