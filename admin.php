<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
// Handle delete logic
if (isset($_GET['delete'])) {
    $idToDelete = intval($_GET['delete']);
    $stmt = $con->prepare("DELETE FROM `admin-series` WHERE id = ?");
    $stmt->bind_param("i", $idToDelete);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Handle insert/update logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $ingredients = $_POST['ingredients'];
    $vitamins = $_POST['vitamins'];
    $category = $_POST['category'];

    $product_img_path = '';
    $sample_img_path = '';

    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        $product_img_path = 'uploads/' . basename($_FILES['product_img']['name']);
        move_uploaded_file($_FILES['product_img']['tmp_name'], $product_img_path);
    } else {
        $product_img_path = $_POST['product_img_existing'] ?? '';
    }

    if (isset($_FILES['sample_img']) && $_FILES['sample_img']['error'] === UPLOAD_ERR_OK) {
        $sample_img_path = 'uploads/' . basename($_FILES['sample_img']['name']);
        move_uploaded_file($_FILES['sample_img']['tmp_name'], $sample_img_path);
    } else {
        $sample_img_path = $_POST['sample_img_existing'] ?? '';
    }

    if ($id) {
        $sql = "UPDATE `admin-series` SET product_name=?, product_img=?, ingredients=?, vitamins=?, sample_img=?, category=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $product_img_path, $ingredients, $vitamins, $sample_img_path, $category, $id);
    } else {
        $sql = "INSERT INTO `admin-series` (product_name, product_img, ingredients, vitamins, sample_img, category) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssss", $name, $product_img_path, $ingredients, $vitamins, $sample_img_path, $category);
    }

    $stmt->execute();
    $stmt->close();
}

// Fetch data
$result = $con->query("SELECT * FROM `admin-series`");

function previewText($text, $limit = 60) {
    return strlen($text) > $limit ? substr($text, 0, $limit) . "...etc." : $text;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruit Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2><span class="glyphicon glyphicon-apple"></span> Manage Fruits & Vegetables</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#dataModal">
        <span class="glyphicon glyphicon-plus"></span> Add New
    </button>  <a href="?logout=true" class="btn btn-danger pull-right">
            <span class="glyphicon glyphicon-log-out"></span> Logout
        </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Ingredients</th>
                <th>Vitamins</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td><?= previewText($row['ingredients']) ?></td>
                <td><?= previewText($row['vitamins']) ?></td>

                <td>
    <a href="view-product.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
        <span class="glyphicon glyphicon-eye-open"></span> View
    </a>
    <button class="btn btn-warning btn-sm editBtn" 
            data-id="<?= $row['id'] ?>"
            data-name="<?= htmlspecialchars($row['product_name']) ?>"
            data-product_img="<?= htmlspecialchars($row['product_img']) ?>"
            data-ingredients="<?= htmlspecialchars($row['ingredients']) ?>"
            data-vitamins="<?= htmlspecialchars($row['vitamins']) ?>"
            data-sample_img="<?= htmlspecialchars($row['sample_img']) ?>"
            data-category="<?= htmlspecialchars($row['category']) ?>">
        <span class="glyphicon glyphicon-edit"></span> Edit
    </button>
    <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
        <span class="glyphicon glyphicon-trash"></span> Delete
    </a>
</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="modal-id">
                    <input type="hidden" name="product_img_existing" id="modal-product-img-existing">
                    <input type="hidden" name="sample_img_existing" id="modal-sample-img-existing">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="modal-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="modal-category" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            <option value="Pork">Pork</option>
                            <option value="Fish">Fish</option>
                            <option value="Vegetable">Vegetable</option>
                            <option value="Dessert">Dessert</option>
                            <option value="Beef">Beef</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="product_img" id="modal-product-img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ingredients</label>
                        <textarea name="ingredients" id="modal-ingredients" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Vitamins</label>
                        <textarea name="vitamins" id="modal-vitamins" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sample Image</label>
                        <input type="file" name="sample_img" id="modal-sample-img" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-floppy-disk"></span> Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$('.editBtn').on('click', function() {
    $('#modal-id').val($(this).data('id'));
    $('#modal-name').val($(this).data('name'));
    $('#modal-category').val($(this).data('category'));
    $('#modal-product-img-existing').val($(this).data('product_img'));
    $('#modal-ingredients').val($(this).data('ingredients'));
    $('#modal-vitamins').val($(this).data('vitamins'));
    $('#modal-sample-img-existing').val($(this).data('sample_img'));
    $('#dataModal').modal('show');
});
</script>
</body>
</html>
