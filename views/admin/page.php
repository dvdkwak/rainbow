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
        <?php foreach($pages as $page) : ?>
            <tr>
                <td><?= $page->id ?></td>
                <td><?= $page->title ?></td>
                <td><?= $page->author ?></td>
                <td><?= $page->active ?></td>
                <td><?= $page->dateCreated ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php view('components/footer.php'); ?>