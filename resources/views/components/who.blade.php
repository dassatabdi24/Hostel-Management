

@if (Auth::guard('web')->check())
<p class="text-success">
	You are <strong>Logged in </strong>as a <strong>STUDENT</strong>
</p>
@else
<p class="text-danger">
	You are <strong>Logged Out STUDENT</strong>
</p>

@endif

@if (Auth::guard('admin')->check())
<p class="text-success">
	You are <strong>Logged in </strong>as an <strong>ADMINISTRATOR</strong>
</p>
@else
<p class="text-danger">
	You are <strong>Logged Out as an Administrator</strong>
</p>

@endif