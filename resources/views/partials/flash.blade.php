@if(Session::has('flash_message'))
	<!-- Note Cool usage of Emmet: div.alert.alert-success etc + Tab-->
	<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
		@if(Session::has('flash_message_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif

		{{-- Session::get('flash_message') --}} <!-- Facade -->
		{{ session('flash_message')}} <!-- helper function -->
	</div>
@endif