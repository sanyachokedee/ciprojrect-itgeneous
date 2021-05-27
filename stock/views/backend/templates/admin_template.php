<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $title; ?> | Admin LTE Stock</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/frontend/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <?php
  $this->load->view('backend/includes/default_css');
  ?>

</head>

<body>
  <?php
  $this->load->view('backend/includes/header');
  $this->load->view($main_content);
  ?>

  <?php
  $this->load->view('backend/includes/footer');
  $this->load->view('backend/includes/default_script');
  ?>
</body>

</html>