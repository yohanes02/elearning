<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $site_title ?></title>

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <base href="<?php echo base_url() ?>" />
</head>

<body>

  <?php include("components/header.php") ?>

  <?php include($content . ".php") ?>

  <?php include("components/footer.php"); ?>
  
</body>