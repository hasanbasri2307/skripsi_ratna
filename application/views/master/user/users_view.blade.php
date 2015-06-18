@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="panel box">
              <div class="panel-body">
              
               @if(!empty($notif))
                        <div class="alert alert-success fade in">
                                  <button type="button" class="close close-sm" data-dismiss="alert">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Sukses !! </strong> {{ $notif }}
                              </div>
                @endif

                <div class="page-header">
                    
                     <p>
                        <h4><em class="pull-left">Username:&nbsp;&nbsp;</em></h4>
                         {{ $user->username }}
                    </p>
                     <p>
                        <h4><em class="pull-left">Level:&nbsp;&nbsp;</em></h4>
                         {{ $user->level }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Status User:&nbsp;&nbsp;</em></h4>
                         <span class="label label-@if($user->status == '1')success @elseif($user->status == '0')danger  @endif">@if($user->status == '1')Aktif @elseif($user->status == '0')Non Aktif  @endif</span>
                    </p>
                  
                   
                </div>
                    <div class="pull-right">
                        <a href="{{ site_url('user') }}" class="btn btn-danger"><i class="arrow_back"></i> Kembali</a>
                        <a href="{{ site_url('user/edit/'.$user->id_user) }}" class="btn btn-success"><i class="icon_pencil-edit"></i> Edit</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
