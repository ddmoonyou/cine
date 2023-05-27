<?php
  if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
    ?>
      <script>
        Swal.fire(
            '<?php echo $_SESSION['status']; ?>',
            '<?php echo $_SESSION['status_text']; ?>',
            '<?php echo $_SESSION['status_code']; ?>'
          )
      </script>
    <?php
    unset($_SESSION['status']);
  }

?>