<?php
    // Define the array for blog posts
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