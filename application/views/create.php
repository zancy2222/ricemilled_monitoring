<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="<?= site_url('product/store'); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br>
        <button type="submit">Add Product</button>
    </form>
    <a href="<?= site_url('product'); ?>">Back to Product List</a>
</body>
</html>
