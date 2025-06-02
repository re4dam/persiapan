<!DOCTYPE html>
<html>

<head>
    <title>Boneka Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white">
        <h1 class="text-2xl">Boneka Management</h1>
        <ul class="flex space-x-4 mt-2">
            <li><a href="index.php" class="hover:underline">Boneka List</a></li>
            <!-- <li><a href="index.php?action=add" class="hover:underline">Add Boneka</a></li> -->
        </ul>
    </nav>
    <div class="container mx-auto p-4">
        <h2 class="text-xl mb-4"><?php echo ($action == 'edit') ? 'Edit Boneka' : 'Add Boneka'; ?></h2>
        <form action="index.php?action=<?php echo ($action == 'edit' && $viewModel->bonekaToEdit != null) ? 'update&id=' . $viewModel->bonekaToEdit->getId() : 'save'; ?>" method="POST" class="space-y-4">
            <div>
                <label class="block">Nama:</label>
                <input type="text" name="nama" value="<?php echo ($action == 'edit' && $viewModel->bonekaToEdit != null) ? $viewModel->bonekaToEdit->getNama() : ''; ?>" class="border p-2 w-full" required>
            </div>
            <div>
                <label class="block">Harga:</label>
                <input type="text" name="harga" value="<?php echo ($action == 'edit' && $viewModel->bonekaToEdit != null) ? $viewModel->bonekaToEdit->getHarga() : ''; ?>" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>

    <div class="container mx-auto p-4">
        <h2 class="text-xl mb-4">Boneka List</h2>
        <table class="w-full border">
            <tr class="bg-gray-200">
                <th class="border p-2">Name</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Actions</th>
            </tr>
            <?php for ($i = 0; $i < $viewModel->getSize(); $i++) { ?>
                <tr>
                    <td class="border p-2"><?php echo $viewModel->getNama($i); ?></td>
                    <td class="border p-2"><?php echo $viewModel->getHarga($i); ?></td>
                    <td class="border p-2">
                        <a href="index.php?action=edit&id=<?php echo $viewModel->getId($i); ?>" class="text-blue-500">Edit</a>
                        <a href="index.php?action=delete&id=<?php echo $viewModel->getId($i); ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>&copy; 2025 Boneka Management System</p>
    </footer>
</body>

</html>
