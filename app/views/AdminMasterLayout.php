<?php $this->view('inc/Admin/header', $data); ?>
<?php $this->view('inc/Admin/sidebar'); ?>
<?php require_once "./app/Views/pages/Admin/" . $data['pages'] . ".php"; ?>
<?php $this->view('inc/Admin/footer', $data); ?>