<?php $this->view('inc/header', $data); ?>
<?php $this->view('inc/sidebar'); ?>
<?php require_once "./app/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('inc/footer', $data); ?>