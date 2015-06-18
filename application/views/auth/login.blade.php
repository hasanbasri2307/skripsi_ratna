@extends("layouts.login")
@section("content")
 <div class="container">

      <form class="login-form" action="{{ site_url('auth/do_login') }}" method="post">
        <div class="login-wrap">
            <h3 align="center">Kelurahan Meruya Selatan</h3>
            <img src="{{ base_url('assets/img/logo-pemprov-dki-jakarta.png') }}" style="width: 150px; margin-left: 80px; margin-bottom: 15px;" />

                @if(isset($error))

                  @if(!empty($error))

                    <div class="alert alert-block alert-danger fade in">
                        <button type="button" class="close close-sm" data-dismiss="alert">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Uppss </strong> {{ $error }}
                    </div>
                  @endif
                @endif

            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Username" autofocus name="username" value="{{ set_value("username") }}">
            </div>
            @if(form_error("username"))
                <p style="color:red">{{ form_error("username") }}</p>
            @endif
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" value="{{ set_value("password") }}">
            </div>
            @if(form_error("password"))
                <p style="color:red">{{ form_error("password") }}</p>
            @endif
                <br />
            <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">

        </div>
      </form>

    </div>
@endsection