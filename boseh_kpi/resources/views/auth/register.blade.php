@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST"  action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="id_pegawai" type="hidden" name="id_pegawai" value="{{ old('name') }}" required>
                                <input id="name" type="hidden" name="name" value="{{ old('name') }}" required>
								<select class="form-control pegawai"  id="pegawai">
									<option> - Pilih Pegawai -</option>
									
									@foreach ($pegawai as $emp)
									<option value="{{$emp->nama}}*{{$emp->id_pegawai}}"> {{$emp->nama}}</option>
									
									@endforeach
								</select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> 
						<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">
								<select class="form-control" name="role_id">
									<option> - Pilih Role -</option>
									@foreach ($role as $role_id)
									<option value="{{$role_id->ROLE_ID}}"> {{$role_id->ROLE_NAME}}</option>
									
									@endforeach
								</select>
								
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
//split(" ")

$('.pegawai').change(function(){

    var data_pegwai = $(this).val().split("*");
	console.log(data_pegwai[0]);
    var nama = $('#name').val(data_pegwai[0]);
    var id_pegwai = $('#id_pegawai').val(data_pegwai[1]);


});
</script>
@stop
