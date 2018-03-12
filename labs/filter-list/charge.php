<?php include 'includes/header.inc.php'; ?>

<div class="app-body">
  <?php include 'includes/sidebar.inc.php'; ?>
  
  <style>
    .data-area {
      margin-top:20px;
    }
  </style>

  <!-- Main content -->
  <main class="main">
    <div class="container-fluid">
    <?php
    echo '<h1 class="data-area">Put all the good stuff about Charge #'.$_GET['id'].' here!</h1>';
    ?>
    </div>
    <!-- /.container-fluid -->
  </main>
</div>
<!-- /.app-body -->

 <?php include 'includes/footer.inc.php'; ?>

