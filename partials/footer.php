<?php
$stmt = $connection->prepare('SELECT `image` FROM `cars_stock`');
$stmt->execute();
$data = $stmt->fetchAll();
?>






<!-- Footer -->
<footer class="py-5">
    <hr>
    <div class="container">
        <p class="m-0 f-left  float-left"> &copy; <?php echo date("Y"); ?> | All rights reserved  </p>
        <p class="m-0  f-left  float-right">Developed By <a target="blank" href="http://www.azoncode.com/">Azoncode</a></p>
    </div>
    <!-- /.container -->
</footer>



<!-- Bootstrap core JavaScript -->

<script src="DataTables/datatables.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
function myfunc() {
    window.print();
}
</script>
</body>

</html>
