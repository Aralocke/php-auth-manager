@extends('pages.base')

@section('breadcrumbs')
<li><a href="{{ URL::route('home') }}">Home</a></li>
<li class="active">Applications</li>
@stop

@section('content.sidebar-subnav-menu')
<div class="sidebar-header">Management</div>
<ul class="nav nav-sidebar nav-sub-sidebar">
	<li><a href="{{ URL::route('applications.create') }}">New Application</a></li>
</ul><!-- ul.nav-sub-sidebar -->
@stop

@section('content.body')
<h2 class="sub-header">Registered Applications</h2>
<div class="table-responsive">
	{{ Form::open(array()) }}
	<table id="applications" class="table table-striped">
		<thead>
			<tr>
				<td colspan="3">{{ ($applications->count() >= $applications->getPerPage())?$applications->links():'&nbsp;' }}</td>
				<td>
					<div class="btn-group" style="margin-top:20px;">
						<button type="button" class="btn btn-default">Action</button>
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>
				</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>Application Name</th>
				<th>App URL</th>
				<th>Callback URL</th>
			</tr>
		</thead>
		<tbody>
		@if ($applications->count() == 0)
			<tr>
				<th>&nbsp;</th>
				<td colspan="3">No applications registered</td>
			</tr>
	    @else
		    @foreach ($applications as $application)
			<tr>
			  	<td>{{ Form::checkbox('select-request[]', $application->id) }}</td>
			  	<td><a href="{{ URL::to('applications/'.$application->id.'/view') }}">{{ $application->name }}</a></td>
			    <td><a href="{{ $application->application_url }}" target="_blank">{{ $application->application_url }}</a></td>
			    <td>{{ $application->callback_url }}</td>
			</tr>
			@endforeach
	    @endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">{{ ($applications->count() >= $applications->getPerPage())?$applications->links():'&nbsp;' }}</td>
				<td>
					<div class="btn-group" style="margin-top:20px;">
						<button type="button" class="btn btn-default">Action</button>
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>
				</td>
			</tr>
		</tfoot>
	</table><!-- table#applications -->
	{{ Form::close() }}
</div><!-- div.table-responsive -->
@stop