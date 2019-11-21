@if(session()->has('flash_notification.message'))
	<div class="container">
		<div class="callout callout-{{ session()->get('flash_notification.level') }} col-md-11 col-md-offset-0">
			{!! session()->get('flash_notification.message') !!}
		</div>
	</div>
@endif