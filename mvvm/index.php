<?php
# Copyright (c) 2025 Zaki Adam. All Rights Reserved.
require_once 'viewmodel/BonekaViewModel.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$viewModel = new BonekaViewModel;

// Fetch the list of boneka for all actions that display the table
if ($action == 'list' || $action == 'add' || $action == 'edit') {
    $viewModel->getBonekaList();
}

if ($action == 'edit' && isset($_GET['id'])) {
    $viewModel->getBonekaById($_GET['id']); // Get the specific boneka for the form
}

// All actions that show the view will now have the list and potentially the item to edit
if ($action == 'list' || $action == 'add' || $action == 'edit') {
    require_once 'view/BonekaView.php';
} elseif ($action == 'save') {
    $viewModel->addBoneka($_POST['nama'], $_POST['harga']);
    header('Location: index.php'); // Redirect to list to see changes
} elseif ($action == 'update' && isset($_GET['id'])) {
    $viewModel->updateBoneka($_GET['id'], $_POST['nama'], $_POST['harga']);
    header('Location: index.php'); // Redirect to list to see changes
} elseif ($action == 'delete' && isset($_GET['id'])) {
    $viewModel->deleteBoneka($_GET['id']);
    header('Location: index.php'); // Redirect to list to see changes
}
// If action is not one of the above, it might be an unhandled case or direct to list
// else {
// header('Location: index.php?action=list');
// }
