@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
                <form method="POST" action="{{ route('users.update', $user->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf

                    @include('user.form')
            </div>
        </div>
        </div>
    </section>
@endsection
