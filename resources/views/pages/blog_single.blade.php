@extends('layouts.app')

@section('content')

 @foreach($posts as $row)
<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">
                    @if(Session()->get('lang') == 'hindi')
								{{ $row->post_title_in }}
								@else
								{{ $row->post_title_en }}
								@endif
					 </div>


					<div class="single_post_text">
						<p> @if(Session()->get('lang') == 'hindi')
								{!! $row->details_in !!}
								@else
								{!! $row->details_en !!}
								@endif </p>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endforeach




@endsection