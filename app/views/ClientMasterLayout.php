<?php $this->view('inc/Client/header', $data); ?>
<?php require_once "./app/Views/pages/Client/" . $data['pages'] . ".php"; ?>
<?php $this->view('inc/Client/footer', $data); ?>