
</div>
<div id="footer" style="text-align: center;">
    <?php 
        echo '<hr>';
        echo 'Copyright ' . date('Y');
    ?>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- may be for datepicker as well -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<!-- for datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- fix datepicker -->
<script>
    $( function() {
    $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "-125:+0",
      dateFormat: "yy-mm-dd"
    });
    } );
</script>
</body>
</html>