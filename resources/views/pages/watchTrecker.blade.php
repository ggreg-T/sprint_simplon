@extends('layouts.home')
@section('content')

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
@endsection
