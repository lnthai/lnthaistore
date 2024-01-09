<?php $this->view('blocks/HeaderClient', $data); ?>//header
<?php require_once "./app/views/pages/" . $data['pages'] . ".php"; ?>
<?php $this->view('blocks/FooterClient', $data); ?>