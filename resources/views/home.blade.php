@extends('layouts.app')
@section('nav')
@include('inc.nav')
@endsection

@section('content')
<div style="text-align:center ">
			<h3>Welcome to SUST Hall Management System!!</h3>
		</div>
<div class="container">
	<div class="row" style="text-align:center ">
		<div class="col-12 align-center">
			<h3 class="h3 text-danger">Notice Board</h3>
		</div>
	</div>
	

	<div class="row mt-1 justify-content-center ">
		<div class="col-7 py-2 bg-white notice msg-card dl">
			<div class="row px-2">

				@foreach ($notices as $notice)
				<div class="col-12  line-notice">
					<h6 class="font-weight-bold text-danger">{{$notice->title}}</h6>
					<div class="row ">
						<div class="col-10">
							<p class="m-0 d-flex py-1 ">{{$notice->notice}}</p>
						</div>
						<div class="col-2 p-0 d-flex align-items-end">
							<span class=" text-faint">{{date('M j, h:ia ',strtotime($notice->created_at))}} </span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
