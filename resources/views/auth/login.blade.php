@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h1 class="title">Login Here</h1>
                    <form action="#" method="post" class="form">
                        {{csrf_field()}}

                        <div class="field">
                            <label for="email" class="lable">Email</label>
                            <p class="control">
                                <input type="email" name="email" id="email" placeholder="e.g mabel@codecourse.com"
                                       class="input{{$errors->has('email')? ' is-danger' : ''}}" value="{{old('email')}}">
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>





                        <div class="field">
                            <label for="password" class="lable">Choose a Password</label>
                            <p class="control">
                                <input type="password" name="password" id="password"
                                       class="input{{$errors->has('password')? ' is-danger' : ''}}">
                            </p>

                            @if($errors->has('password'))
                                <p class="help is-danger">{{$errors->first('password')}}</p>
                            @endif
                        </div>


                        <div class="field is-grouped">
                            <p class="control">
                                <label for="remeber" class="checkout">
                                    <input type="checkbox" name="remeber" id="remeber" checked>
                                    Remeber Me
                                </label>
                            </p>


                        </div>

                        <div class="field is-grouped">
                            <p class="control">
                                <button type="submit" class="button is-primary">Sign In</button>
                            </p>

                            <p>
                                <a href="{{route('password.request')}}">Forgotten Your Password?</a>
                            </p>
                        </div>


                    </form>
                </div>
            </div>
        </div>


    </section>

@endsection
