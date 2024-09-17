<?php
    // Define the array for blog posts
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