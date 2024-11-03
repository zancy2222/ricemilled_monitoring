<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="<?= site_url('product/update/' . $product->id); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $product->name; ?>" required>
        <br>
        <label for="qty">Quantity:</label>
        <input type="number" name="qty" value="<?= $product->qty; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required><?= $product->description; ?></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?= $product->price; ?>" required>
        <br>
        <button type="submit">Update Product</button>
    </form>
    <a href="<?= site_url('product'); ?>">Back to Product List</a>
</body>
</html>
