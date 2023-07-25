@extends('layouts.app')

@section('title', 'Pusat Informasi')

@push('css')
	<style>
		/* .accordion{overflow-anchor:none}.accordion>.card{overflow:hidden}.accordion>.card:not(:last-of-type){border-bottom:0;border-bottom-right-radius:0;border-bottom-left-radius:0}.accordion>.card:not(:first-of-type){border-top-left-radius:0;border-top-right-radius:0}.accordion>.card>.card-header{border-radius:0;margin-bottom:0} */
	</style>
@endpush

@section('content')
	<h3 class="mb-3"><span>Pusat Informasi</span></h3>

	<div class="row">
		<div class="col-md-12">
				<div id="accordion">
					<div class="card card-primary">
					<div class="card-header">
						<h4 class="card-title w-100">
							
							<a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
								Title #1
						</a>
						</h4>
					</div>
					<div id="collapseOne" class="collapse" data-parent="#accordion">
						<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
						3
						wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
						laborum
						eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
						nulla
						assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
						nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
						beer
						farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
						labore sustainable VHS.
						</div>
					</div>
					</div>
					<div class="card card-danger">
					<div class="card-header">
						<h4 class="card-title w-100">
						<a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
							Title #2
						</a>
						</h4>
					</div>
					<div id="collapseTwo" class="collapse" data-parent="#accordion">
						<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
						3
						wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
						laborum
						eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
						nulla
						assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
						nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
						beer
						farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
						labore sustainable VHS.
						</div>
					</div>
					</div>
					<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title w-100">
						<a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
							Title #3
						</a>
						</h4>
					</div>
					<div id="collapseThree" class="collapse" data-parent="#accordion">
						<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
						3
						wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
						laborum
						eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
						nulla
						assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
						nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
						beer
						farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
						labore sustainable VHS.
						</div>
					</div>
					</div>
			</div>
		<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
@endsection