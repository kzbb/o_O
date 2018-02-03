@extends('layouts.app2')

@section('content')
<div class="container pt-3">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card my-2" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
                <div class="card-body px-3 py-3">

                    <form id="saveSettings" method="POST" action="savesettings">
                        {{ csrf_field() }}
                    </form>
                    <form id="deleteUser" method="POST" action="deleteuser">
                        {{ csrf_field() }}
                    </form>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">User Name</label>
                        <div class="col-sm-9">
                            <input id="name" name="name" form="saveSettings" type="text" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">E-Mail</label>
                        <div class="col-sm-9">
                            <input id="email" name="email" form="saveSettings" type="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-sm-3 col-form-label">URL</label>
                        <div class="col-sm-9">
                            <input id="url" name="url" form="saveSettings" type="text" class="form-control" value="{{ $user_profile->url }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="timezone" class="col-sm-3 col-form-label">TimeZone</label>
                        <div class="col-sm-9">
                            <select class="custom-select" form="saveSettings" name="timezone" class="">
                                <?php $timezone_identifiers = \DateTimeZone::listIdentifiers(); ?>
                                @foreach( $timezone_identifiers as $timezone_identifier )
                                    <option value="{{ $timezone_identifier }}" @if( $timezone_identifier == $user_profile->timezone ) selected @endif>
                                        {{ $timezone_identifier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <div class="col">
                            <button form="deleteUser" class="btn btn-outline-danger btn-sm">Delete User</button>
                        </div>
                        <div class="col text-right">
                            <button form="saveSettings" class="btn btn-primary btn-sm">Save</button>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
