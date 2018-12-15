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
			{{-- <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addtodo">Add New</button> --}}
			<div class="clearfix"></div>
		</div>
		<div class="panel-body">
			@include('multiauth::message')
			<table class="table table-hover table-responsive table-striped">
				<form action="{{ route('todo.add') }}" method="POST" accept-charset="utf-8">
					@csrf
					<input type="text" name="task" class="form-control" placeholder="Add New Task">
				</form>
				<tbody>
					@foreach($tasks as $task)
					<tr>
						<td width="15px;">
							<input type="checkbox" name="todo[]">
						</td>
						<td>{{ $task->task }}</td>
						<td class="pull-right">
							<form action="{{ route('task.delete',[Crypt::encrypt($task->id)]) }}" method="POST">
								@csrf @method('delete')
								<a href="#" class="edit btn btn-default btn-xs"
									data-id="{{$task->id}}"
									data-title="{{$task->task}}">
									<i class="fa fa-edit"></i>
								</a>
								<button type="submit" class="btn btn-xs btn-danger" onclick="return deleteconfig()"><i class="fa fa-trash"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
		
	</div>
</div>
{{-- @include('vendor.multiauth.todo.add') --}}
{{-- Modal Form Edit and Delete Post --}}
<div id="edit"class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Task</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="modal">
					<input type="hidden" class="form-control" name="id" id="id">
					<div class="form-group">
						<input type="text" name="task" class="form-control" id="task">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn actionBtn" data-dismiss="modal">
				<span id="footer_action_button" class="glyphicon"></span>
				</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">
				<span class="glyphicon glyphicon"></span>close
				</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
    }
  });
}

</script>
@endsection