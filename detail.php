<?php
    // Define the array for blog posts (same array from index.php)
    $blogPosts = [
        [
            "title" => "Introduction to PHP",
            "content" => "PHP is a popular server-side scripting language designed for web development. In this post, we’ll explore the basics of PHP.",
            "author" => "John Doe",
            "date" => "2024-09-12"
        ],
        [
            "title" => "Getting Started with HTML",
            "content" => "HTML is the standard markup language for creating web pages. This post will guide you through its basic elements and structure.",
            "author" => "Jane Smith",
            "date" => "2024-09-11"
        ],
        [
            "title" => "Understanding CSS Flexbox",
            "content" => "Flexbox is a powerful layout model in CSS that helps in creating responsive designs. Let's dive into how it works.",
            "author" => "Alex Johnson",
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
