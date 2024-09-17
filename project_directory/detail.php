<?php
    // Define the array for blog posts (same array from index.php)
    $blogPosts = [
        [
            "title" => "The Amazing Spider-Man",
            "content" => "The orgins and evolution of Spider-Man has stood the test of time through multiple different types of media.",
            "author" => "Peter Parker",
            "date" => "2024-09-12"
        ],
        [
            "title" => "Getting Started with Coding",
            "content" => "Coding can seem intimidating at first, but once you start you can build your skills as coding becomes easier.",
            "author" => "Jane Doe",
            "date" => "2024-09-11"
        ],
        [
            "title" => "Pinball Machines",
            "content" => "Pinball machines have seen a resurgence in popularity. This post brings awareness to how fun they are!",
            "author" => "Jake Richman",
            "date" => "2024-09-10"
        ]
    ];

    // Function to get the blog post by its ID
    function getBlogPost($id, $posts) {
        if (isset($posts[$id])) {
            return $posts[$id];
        } else {
            return null;
        }
    }

    // Get the post_id from the URL
    $postId = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;

    // Get the blog post by ID
    $post = getBlogPost($postId, $blogPosts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
<?php if ($post): ?>
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="card-title"><?= $post["title"]; ?></h2>
                <p class="card-text"><strong>Author:</strong> <?= $post["author"]; ?></p>
                <p class="card-text"><strong>Date:</strong> <?= $post["date"]; ?></p>
                <p class="card-text"><?= $post["content"]; ?></p>
                <a href="index.php" class="btn btn-primary">Back to blog posts</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger mt-5">Blog post not found.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

