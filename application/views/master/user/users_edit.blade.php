@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Ubah User</header>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="{{ current_url() }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" readonly="true">
                                <span class="help-block"><?php echo form_error('username'); ?></span>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" value="{{ $user->password }}" readonly="true">
                                <span class="help-block"><?php echo form_error('password'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control m-bot15" name="level">
                                        @foreach(generate_level() as $key => $item)
                                          <option value="{{ $key }}" @if($user->level == $key) selected='selected' @endif>{{ $item }}</option>
                                         @endforeach
                                </select>
                                <span class="help-block"><?php echo form_error('level'); ?></span>
                            </div>
                        </div>
                       <div class="form-group">
                                      <label for="inputSuccess" class="control-label col-lg-2">Status</label>
                                      <div class="col-lg-10">
                                          <label class="checkbox-inline">
                                              <input type="radio" value="1" id="inlineCheckbox1" name="status" @if($user->status==1) checked="checked" @endif> Active
                                          </label>
                                          <label class="checkbox-inline">
                                              <input type="radio" value="0" id="inlineCheckbox2" name="status" @if($user->status==0) checked="checked" @endif> Non Active
                                          </label>
                                          

                                      </div>
                                  </div>
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <a class="btn  btn-danger" href="{{ site_url('user') }}"><i class="arrow_back"></i> Batal</a>
                                <button class="btn btn-primary" type="submit"><i class="icon_floppy"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
