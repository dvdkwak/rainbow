<?php include_once view('components/header.php', True); ?>

<h1>Items</h1>

<?php view('components/menu.php'); ?>

<table>
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Author</th>
        <th>Active</th>
        <th>Date Created</th>
    </thead>
    <tbody>
        <?php foreach($items as $item) : ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->title ?></td>
                <td><?= $item->author ?></td>
                <td><?= $item->active ?></td>
                <td><?= $item->dateCreated ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('components/footer.php'); ?>