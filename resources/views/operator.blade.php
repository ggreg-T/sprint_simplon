<!DOCTYPE html>
<html>

<head>
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
	<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js">
	</script>
	<link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
	<link rel="stylesheet"
		type="text/css" href=
"https://use.fontawesome.com/releases/v5.6.3/css/all.css">

	<script type="text/javascript">
		function showHideRow(row) {
			$("#" + row).toggle();
		}
	</script>

	<style>
		body {
			margin: auto;
			padding: 20px;
			text-align: center;
			width: 100%;
			font-family: "Myriad Pro",
				"Helvetica Neue", Helvetica,
				Arial, Sans-Serif;
		}

		#wrapper {
			margin: 0 auto;
			padding: 0px;
			text-align: center;
			width: 995px;
		}

		#wrapper h1 {
			margin-top: 50px;
			font-size: 45px;
			color: #585858;
		}

		#wrapper h1 p {
			font-size: 20px;
		}

		#table_detail {
			width: 500px;
			text-align: left;
			border-collapse: collapse;
			color: #2E2E2E;
			border: #A4A4A4;
		}

		#table_detail tr:hover {
			background-color: #F2F2F2;
		}

		#table_detail .hidden_row {
			display: none;
		}
	</style>
</head>

<body>

	<div id="wrapper">

		<table border=1 id="table_detail"
			align=center cellpadding=10>

			<tr class=text-center>
				<th>Liste des utilisateurs</th>
				<th>Situation</th>
			</tr>

			<tr onclick="showHideRow('hidden_row1');">
				<td>Utilisateur</td>
				<td>Délais dépassé</td>
			<tr id="hidden_row1" class="hidden_row">
      <td colspan=2>
          <p>Contact 1: 06.92.xx.xx.xx</p>
          <p>Contact 2: 06.92.xx.xx.xx</p>
        </td>

			</tr>


			<tr onclick="showHideRow('hidden_row2');">
				<td>Utilisateur</td>
				<td>En cours de marche</td>
			</tr>
			<tr id="hidden_row2" class="hidden_row">
      <td colspan=2>
          <p>Contact 1: 06.92.xx.xx.xx</p>
          <p>Contact 2: 06.92.xx.xx.xx</p>
        </td>
			</tr>

			<tr onclick="showHideRow('hidden_row3');">
				<td>Utilisateur</td>
				<td>Délais</td>
			</tr>
			<tr id="hidden_row3" class="hidden_row">
      <td colspan=2>
          <p>Contact 1: 06.92.xx.xx.xx</p>
          <p>Contact 2: 06.92.xx.xx.xx</p>
        </td>
			</tr>

			<tr onclick="showHideRow('hidden_row4');">
				<td>Utilisateur</td>
				<td>Marche terminée</td>
			</tr>
			<tr id="hidden_row4" class="hidden_row">
      <td colspan=2>
          <p>Contact 1: 06.92.xx.xx.xx</p>
          <p>Contact 2: 06.92.xx.xx.xx</p>
        </td>
			</tr>

		</table>
	</div>
	@include('layouts.footer')
</body>

</html>
