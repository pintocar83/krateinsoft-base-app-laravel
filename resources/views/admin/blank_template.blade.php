@extends('admin.layout')

@section('navbar_title')
{{ __('Module') }}
@endsection

@section('navbar_breadcrumb')
<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
	<li class="breadcrumb-item text-muted">
		<a href="/admin" class="text-muted text-hover-primary">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<span class="bullet bg-gray-300 w-5px h-2px"></span>
	</li>
	<li class="breadcrumb-item text-muted">Module</li>
</ul>
@endsection

@section('content')
					
@endsection

@section('stylesheet')

@endsection

@section('scripts')
<script src="/assets/themes/default/plugins/custom/datatables/datatables.bundle.js"></script>
<script type="text/javascript">
	var Module={

		init: function(){
			var me=this;

		},

		initList: function(){
			var me=this;
			
		},

		search: function(){
			var me=this;

		},

		list: function(){
			var me=this;

		},

		add: function(){
			var me=this;

		},

		edit: function(id, index) {
			var me=this;

		},

		save: function(){
			var me=this;

		},

		delete: function(id){
			var me=this;

		},

		deleteConfirm: function(){
			var me=this;

		},

	};

	$(function() {
	    Module.init();
	});
</script>
@endsection