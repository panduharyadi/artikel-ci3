<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partials/head.php'); ?>
</head>
<body>
    <?php $this->load->view('partials/navbar.php'); ?>
    <ul>
        <?php foreach($articles as $article): ?>
            <li>
                <a href="<?= site_url('article/'.$article->slug) ?>">
                    <?= $article->title ? html_escape($article->title) : "No Title" ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $this->load->view('partials/footer.php'); ?>   
</body>
</html>