@extends('layouts.settings.default')
@push('css_lib')
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
<!-- select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
{{--dropzone--}}
<link rel="stylesheet" href="{{asset('plugins/dropzone/bootstrap.min.css')}}">
@endpush
@section('settings_title',trans('lang.user_table'))
@section('settings_content')
@include('flash::message')
@include('adminlte-templates::common.errors')
<div class="clearfix"></div>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
            <li class="nav-item">
                <a class="nav-link" href="{!! route('users.driver.index') !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.user_table')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{!! route('users.driver.create') !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.user_create')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-pencil mr-2"></i>{{trans('lang.user_edit')}}</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        {!! Form::model($user, ['route' => ['users.driver.update', $user->id], 'method' => 'patch']) !!}
        <div class="row">
            @include('settings.users.driver.fields')
        </div>
        {!! Form::close() !!}
        <div class="clearfix"></div>
    </div>
</div>
</div>
@include('layouts.media_modal',['collection'=>null])
@endsection
@push('scripts_lib')
<!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- select2 -->
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
{{--dropzone--}}
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    var dropzoneFields = [];

    let role = document.getElementById('roles');
    let _key = document.getElementById('key');
    let _selected = document.getElementById('role_selected')
    role.onchange = function() {
        if (role.value !== 'admin') {
            if ((_selected.value !== undefined || _selected.value !== null || _selected.value !== '') && (role.value !== _selected.value)) {
              alert(`Tenga en cuenta que la clave actual ${_key.innerHTML} le pertenece al rol ${_selected.value}, lo cual cambiara de acuerdo al rol seleccionado`);
            }
        }
    };

</script>
@endpush
