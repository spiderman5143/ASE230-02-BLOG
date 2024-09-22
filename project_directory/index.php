<?php
    $json_data = file_get_contents("post.json");
    $blogPosts = json_decode($json_data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
    <h1 class="text-center mt-5">Welcome to the Blog</h1>
    <h2 class="mt-4">Blog Posts</h2>
    <div class="list-group">
        <?php foreach ($blogPosts as $id => $post){ ?>
            <a href="detail.php?post_id=<?php echo $id; ?>" class="list-group-item list-group-item-action">
                <?php echo $post["title"]; ?>
            </a>
        <?php }; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>