<?php
$json_data = file_get_contents("post.json");
$blogPosts = json_decode($json_data, true);

// Function to get the blog post by its ID
function getBlogPost($id, $posts) {
    return isset($posts[$id]) ? $posts[$id] : null;
}

// Get the post_id from the URL
$postId = isset($_GET['post_id']) ? (int)$_GET['post_id'] : 0;

// Get the blog post by ID
$post = getBlogPost($postId, $blogPosts);

function updateVisitorCount($post_id, $blogPosts) {
    $file = 'visitors.csv';

    // Check if the file exists; if not, create it with initial data
    if (!file_exists($file)) {
        $fp = fopen($file, 'w');
        for ($i = 0; $i < count($blogPosts); $i++) {
            fputcsv($fp, [$i, 0]); // Initialize visitor counts to 0
        }
        fclose($fp);
    }

    // Read existing data
    $rows = [];
    if (file_exists($file)) {
        // Read the CSV file and convert it to an associative array
        foreach (file($file) as $line) {
            list($key, $value) = str_getcsv($line);
            $rows[$key] = (int)$value; // Convert value to integer
        }
    }


    // Update the visitor count
    if (isset($rows[$post_id])) {
        $rows[$post_id]++; // Increment the count
    } else {
        $rows[$post_id] = 1; // Initialize to 1 if not found
    }

    $fp = fopen($file, 'w');
    foreach ($rows as $key => $value) {
        fputcsv($fp, [$key, $value]);
    }
    fclose($fp);

}

function getVisitorCount($post_id) {
    $file = 'visitors.csv';
    if (!file_exists($file)) {
        return 0; // If the file doesn't exist, return 0
    }

    $rows = array_map('str_getcsv', file($file));
    foreach ($rows as $row) {
        if ($row[0] == $post_id) {
            return (int)$row[1]; // Return the visitor count
        }
    }
    return 0; // Default to 0 if post_id not found
}

// Call the function when a post is viewed
if ($post) {
    updateVisitorCount($postId, $blogPosts);
}

$visitor_count = getVisitorCount($postId);
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
                <p>Visitor Count: <?= $visitor_count; ?></p>
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
