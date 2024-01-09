<?php $this->view('inc/admin/header', $data); ?>
<?php $this->view('inc/admin/sidebar'); ?>
<?php require_once "./app/views/pages/admin/" . $data['pages'] . ".php"; ?>
<?php $this->view('inc/admin/footer', $data); ?>