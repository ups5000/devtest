@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="alert alert-info">
                        @if ( @isset($days_to_bday) )
                        <h1>{{  $days_to_bday . ' days until your Birthday!' }} </h1>
                        @else
                            {{'Enter your birth date to calculate the days left for your birthday'  }}
                        @endif
                      
                  </section>
                    <form name="form_edit_date" method="post">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label for="i_birthdate">Birth Date</label>
                                <input type="text" class="form-control" id="i_birthdate" name="birthdate" placeholder="yyyy/mm/dd" value="{{ $date ?? '' }}">
                                <small id="i_birthdate_msg" class="form-text text-muted">You can modify the date of birth as many times as you want! </small>
                            </div>
                            <button type="submit" class="btn btn-success">Edit</button>
                        </fieldset>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
