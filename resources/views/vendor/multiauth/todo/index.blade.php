@extends('multiauth::layouts.app')
@section('content')
<section class="content-header well">
	<h1>
	Dashboard
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">To Do List</li>
	</ol>
	<br>
</section>
<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-primary well">
		<div class="panel-heading">
			<span class="pull-left">
				Items To Do
			</span>
			<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addtodo">Add New</button>
			<div class="clearfix"></div>
		</div>
		<div class="panel-body">
			@include('multiauth::message')
			<table class="table table-hover table-responsive table-striped">
				<thead>
					<tr>
						<th>id</th>
						<th>Things To Do</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>John</td>
						<td>Doe</td>
						<td>john@example.com</td>
					</tr>
					<tr>
						<td>Mary</td>
						<td>Moe</td>
						<td>mary@example.com</td>
					</tr>
					<tr>
						<td>July</td>
						<td>Dooley</td>
						<td>july@example.com</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
	</div>
</div>
@include('vendor.multiauth.todo.add')
@endsection