@extends('layouts.auth')

@section('script')
<script type="text/javascript">
    $(window).ready(function(){
        function imageReader(){
            if(this.files && this.files[0]){
                var reader = new FileReader();
                reader.addEventListener("load", function(e){
                    console.log(e.target.result);
                    $(".avatar").css("background-image", 'url("' + e.target.result + '")');
                });
                reader.readAsDataURL(this.files[0]);
            }
        }

        document.getElementById("avatarinput").addEventListener("change", imageReader);
    });
</script>
@endsection

@section('content')
<h1 class="left-headline">Register</h1>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-3 avatar-box">
            <div class="avatar-container">
                <div id="avatar" class="avatar" style="background-image: url('img/avatar.png');">
                    <div class="avatar-hint">Change Avatar</div>
                    <input type="file" name="picture" id="avatarinput" class="avatarinput" accept=".jpg,.jpeg,.png">
                </div>
            </div>
            <div class="discription">
                Click on the avatar to change.
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group{{ $errors->has('name') || $errors->has('surname') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="name" class="register-label">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-6">
                    <label for="surname" class="register-label">Surname</label>
                    <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>

                    @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <label for="username" class="register-label">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <label for="email" class="register-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <label for="password" class="register-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                <label for="password-confirm" class="register-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
