@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row mt-4">
		<div class="col-md-4 offset-md-8">
			<div class="form-group">
				<select id="order_field" class="form-control">
					<option value="" disabled selected>Urutkan</option>
					<option value="best_seller">Best Seller</option>
					<option value="terbaik">Terbaik (Berdasarkan Rating)</option>
					<option value="termurah">Termurah</option>
					<option value="termahal">Termahal</option>
					<option value="terbaru">Terbaru</option>
				</select>
			</div>
		</div>
	</div>

	@foreach($products as $idx => $product)
		@if ($idx == 0 || $idx % 4 == 0)
			<div class="row mt-4">
		@endif
		
		<div class="col">
			<div class="card">
				{{-- @if (!$product->images()->get()->isEmpty())
				<img src="{{ asset('/img/'.$product->images()->get()[0]->image_src) }}" style="width: 200px; height: 200px" class="center">
				@endif --}}
				<div class="card-body">
					<h5 class="card-title">
						<a href="{{ route('products.show', ['id' => $product->id]) }}">
							{{ $product -> name}}
						</a>
					</h5>
					<p class="card-text">
						{{ $product -> price }}
					</p>
					<a href="{{ route('carts.add', ['id' => $product->id]) }}" class="btn btn-primary">Beli</a>
					<a href="{{ route('products.show', ['id' => $product->id]) }}" class="btn btn-primary">Show</a>
				</div>
			</div>
		</div>	

		@if ($idx > 0 && $idx % 4 == 3)
			</div>
		@endif
	@endforeach
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#order_field').change(function(){
			window.location.href = '/products?order_by=' + $(this).val();
		});
	});
</script>
@endsection