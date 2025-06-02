<?php
# Copyright (c) 2025 Zaki Adam. All Rights Reserved.
require_once 'viewmodel/BonekaViewModel.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$viewModel = new BonekaViewModel;
if ($action == 'list') {
    $bonekaList = $viewModel->getBonekaList();
    require_once 'view/BonekaView.php';
} elseif ($action == 'add') {
    // $departments = $viewModel->getDepartments();
    // $shifts = $viewModel->getShifts();
    // require_once 'views/staff_form.php';
} elseif ($action == 'edit') {
    $boneka = $viewModel->getBonekaById($_GET['id']);
    // $departments = $viewModel->getDepartments();
    // $shifts = $viewModel->getShifts();
    require_once 'view/BonekaView.php';
} elseif ($action == 'save') {
    $viewModel->addBoneka($_POST['nama'], $_POST['harga']);
    header('Location: index.php');
} elseif ($action == 'update') {
    $viewModel->updateBoneka($_GET['id'], $_POST['name'], $_POST['harga']);
    header('Location: index.php');
} elseif ($action == 'delete') {
    $viewModel->deleteBoneka($_GET['id']);
    header('Location: index.php');
}
