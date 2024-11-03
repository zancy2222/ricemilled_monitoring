<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .btn-primary, .btn-warning {
            border-radius: 25px;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            transition: background-color 0.3s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-group label {
            font-weight: bold;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }

        .modal-body {
            padding: 2rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Product Management</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addProductModal">
            <i class="fas fa-plus"></i> Add Products
        </button>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['qty']) ?></td>
                            <td><?= htmlspecialchars($product['description']) ?></td>
                            <td><?= number_format($product['price'], 2) ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductModal"> Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" id="productName" required>
                        </div>
                        <div class="form-group">
                            <label for="productQty">Quantity</label>
                            <input type="number" class="form-control" id="productQty" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Description</label>
                            <textarea class="form-control" id="productDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Price</label>
                            <input type="number" class="form-control" id="productPrice" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">
                        <input type="hidden" id="editProductId">
                        <div class="form-group">
                            <label for="editProductName">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" required>
                        </div>
                        <div class="form-group">
                            <label for="editProductQty">Quantity</label>
                            <input type="number" class="form-control" id="editProductQty" required>
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Description</label>
                            <textarea class="form-control" id="editProductDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
