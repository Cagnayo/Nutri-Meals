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
    $instruction = $_POST['instruction'];
    $description = $_POST['description'];

    $product_img_path = '';
    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        $product_img_path = 'uploads/' . basename($_FILES['product_img']['name']);
        move_uploaded_file($_FILES['product_img']['tmp_name'], $product_img_path);
    } else {
        $product_img_path = $_POST['product_img_existing'] ?? '';
    }

    if ($id) {
        $sql = "UPDATE `admin-series` SET product_name=?, product_img=?, ingredients=?, vitamins=?, category=?, instruction=?, description=? WHERE id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssi", $name, $product_img_path, $ingredients, $vitamins, $category, $instruction, $description, $id);
    } else {
        $sql = "INSERT INTO `admin-series` (product_name, product_img, ingredients, vitamins, category, instruction, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssss", $name, $product_img_path, $ingredients, $vitamins, $category, $instruction, $description);
    }

    $stmt->execute();
    $stmt->close();
}

// Fetch data
$filterCategory = $_GET['category'] ?? '';
if ($filterCategory && $filterCategory !== 'All') {
    $stmt = $con->prepare("SELECT * FROM `admin-series` WHERE category = ?");
    $stmt->bind_param("s", $filterCategory);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    $result = $con->query("SELECT * FROM `admin-series`");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    .truncate-text {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-group-sm .btn {
        margin-right: 5px;
    }

    .btn-group-sm {

        display: flex;
        align-self: center;
    }

    .top-header {
        padding-bottom: 20px;
    }
</style>

<body>
    <div class="container-fluid" style="margin: 0px 15% 0px 15%;">
        <div class="top-header">
            <h2> Manage Fruits & Vegetables</h2>
            <button class="btn btn-success" data-toggle="modal" data-target="#dataModal">
                <span class="glyphicon glyphicon-plus"></span> Add New
            </button>
            <a href="?logout=true" class="btn btn-danger pull-right">
                <span class="glyphicon glyphicon-log-out"></span> Logout
            </a>

        </div>
        <div class="btn-group" style="margin-bottom: 15px;">
            <a href="?category=All" class="btn btn-primary">All Meals</a>
            <a href="?category=Pork" class="btn btn-default">Pork</a>
            <a href="?category=Beef" class="btn btn-default">Beef</a>
            <a href="?category=Chicken" class="btn btn-default">Chicken</a>
            <a href="?category=Vegetable" class="btn btn-default">Vegetable</a>
            <a href="?category=Fish" class="btn btn-default">Fish</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Ingredients</th>
                    <th>Vitamins</th>
                    <th>Instructions</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <td><?= htmlspecialchars($row['category']) ?></td>
                        <td><span class="truncate-text"><?= htmlspecialchars($row['description']) ?></span></td>
                        <td><span class="truncate-text"><?= htmlspecialchars($row['ingredients']) ?></span></td>
                        <td><span class="truncate-text"><?= htmlspecialchars_decode($row['instruction']) ?></span></td>
                        <td><span class="truncate-text"><?= htmlspecialchars($row['vitamins']) ?></span></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="admin-view.php?id=<?= $row['id'] ?>" class="btn btn-info">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <button class="btn btn-warning editBtn"
                                    data-id="<?= $row['id'] ?>"
                                    data-name="<?= htmlspecialchars($row['product_name']) ?>"
                                    data-product_img="<?= htmlspecialchars($row['product_img']) ?>"
                                    data-ingredients="<?= htmlspecialchars($row['ingredients']) ?>"
                                    data-vitamins="<?= htmlspecialchars($row['vitamins']) ?>"
                                    data-category="<?= htmlspecialchars($row['category']) ?>"
                                    data-instruction="<?= htmlspecialchars($row['instruction']) ?>"
                                    data-description="<?= htmlspecialchars($row['description']) ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add/Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="modal-id">
                        <input type="hidden" name="product_img_existing" id="modal-product-img-existing">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="modal-name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" id="modal-category" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                <option value="Pork">Pork</option>
                                <option value="Beef">Beef</option>
                                <option value="Chicken">Chicken</option>
                                <option value="Vegetable">Vegetable</option>
                                <option value="Dessert">Dessert</option>
                                <option value="Fish">Fish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" id="modal-description" rows="3"></textarea>
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
                            <label>Instructions</label>
                            <textarea name="instruction" class="form-control" id="modal-instruction" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nutrient Content</label>
                            <textarea name="vitamins" class="form-control rich-text" id="modal-vitamins" rows="4"></textarea>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/n5u8fybgj1j9eogywke529u8wl3zruqakdk2lskvf0413z03/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $('form').on('submit', function() {
            tinymce.triggerSave(); // ✅ Sync content from TinyMCE to textarea
        });
        tinymce.init({
            selector: 'textarea.rich-text',
            menubar: false,
            toolbar: 'bold italic underline | bullist numlist | undo redo',
            branding: false
        });

        $('form').on('submit', function() {
            tinymce.triggerSave(); // <--- ADD THIS LINE
        });

        $('.editBtn').on('click', function() {
            $('#modal-id').val($(this).data('id'));
            $('#modal-name').val($(this).data('name'));
            $('#modal-category').val($(this).data('category'));
            $('#modal-product-img-existing').val($(this).data('product_img'));
            $('#modal-ingredients').val($(this).data('ingredients'));
            tinymce.get('modal-vitamins').setContent($(this).data('vitamins'));
            $('#modal-instruction').val($(this).data('instruction'));
            $('#dataModal').modal('show');
            $('#modal-description').val($(this).data('description'));

        });
    </script>
</body>

</html>