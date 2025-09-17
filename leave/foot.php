<footer>
	<div class="container">
		<div class="copy text-center">
			2019 - <?php echo $year; ?> @ <a href='#' style="font-weight: bold;">KMP-Leave Management Portal</a> &nbsp;&nbsp;|:|&nbsp;&nbsp;
			Developed By <a style="font-weight: bold;">Reaz Uddin Ahmmed</a> <span style="font-size:0.8em;">PPM</span>, <strong>Police Super</strong>
		</div>
	</div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jqueryv1.11.1.js"></script>
<!-- jQuery UI -->
<script src="js/jquery-uiv1.10.3.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables/dataTables.bootstrap.js"></script>
<script src="js/custom.js"></script>
<script src="js/tables.js"></script>
<script>
	function confirmD(link) {
		if (confirm("Are you sure DELETE data?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmP(link) {
		if (confirm("Are you sure Publish?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmJ(link) {
		if (confirm("Are you sure Re-Join Now?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmAR(link) {
		if (confirm("Are you sure Accept Request?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmRR(link) {
		if (confirm("Are you sure Reject Request?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmUp(link) {
		if (confirm("Are you sure Unpublish?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}

	function confirmDOA(link) {
		if (confirm("Are you sure Disable Online Access?")) {
			doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
		}
		return false;
	}
</script>
<script>
	setTimeout(function() {
		$('#Aclose').fadeOut('slow');
	}, 5000);
</script>
</body>

</html>