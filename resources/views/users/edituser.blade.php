@extends('layouts.app')


@section('content')
<style>
    .delete {
        background-color: Transparent; 
    }
</style>
<div class="content-wrapper">
	<div class="content">
	<h3><span class="text-semibold">Edit account</span></h3>
    @include('layouts.messages')
		<div>
			<div class="page-header-content"></div>
			<div class="breadcrumb-line breadcrumb-line-component">
				<ul class="breadcrumb">
					<li><a href="/home"><i class="icon-home2 position-left"></i> Home</a></li>
					<li><a href="/users">Employees</a></li>
					<li class="active">Edit account</li>
				</ul>
				<ul class="breadcrumb-elements">
					<li><a href="{{ route('register') }}"><i class="icon-user-plus position-left"></i> Add Employee</a></li>
					</ul>
			</div>
		</div>
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Change Name @if ($user->isBan == 1) <span class="label label-danger">Deactivated</span> @endif</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>>
                    </ul>
                </div>
            </div>

            <form method="POST" action="{{ url('changename') }}">
                {{ csrf_field() }}
            <div class="panel-body">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <label for="lastname" class="control-label">Surname</label>
                        <div>
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required autofocus>
                            @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                             @endif
                        </div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <label for="firstname" class="control-label">First name</label>
                        <div>
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required autofocus>

                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                        <label for="middlename" class="control-label">Middle name</label>
                        <div>
                            <input id="middlename" type="text" class="form-control" name="middlename" value="{{$user->middlename}}" required autofocus>
                            @if ($errors->has('middlename'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middlename') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="text-right">
                    <button type="submit" class="btn bg-teal">Save <i class="icon-arrow-right14 position-right"></i></button>
                </div>              
            </div>
            </form>
        </div>

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Account information</h6>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>>
                    </ul>
                </div>
            </div>
            
                <form  method="POST" action="{{ url('updateposition') }}">
                 {{ csrf_field() }}
                 <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                    <label for="position" class="control-label">Position</label>
                                    <div>
                                        <select name="position">
                                            <option value="Admin">Admin</option>
                                            <option value="Director">Director</option>
                                            <option value="Secretary">Secretary</option>
                                            <option value="District Pastor">District Pastor</option>
                                        </select>
                                        @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                       
                            <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                                        <label for="district" class="control-label">District</label>
                                        <div>
                                        <select name="district">
                                            <option value="All">All</option>
                                            <option value="Metro Lipa District">Metro Lipa District</option>
                                            <option value="East. BatangasDist">East. BatangasDist</option>
                                            <option value="San Juan District">San Juan District</option>
                                            <option value="Metro Batangas">Metro Batangas</option>
                                            <option value="Central Batangas I">Central Batangas I</option>
                                            <option value="Central Batangas II">Central Batangas II</option>
                                            <option value="West. Batangas I">West. Batangas I</option>
                                            <option value="West. Batangas II">West. Batangas II</option>
                                            <option value="Metro San Pablo Di">Metro San Pablo Di </option>
                                            <option value="Upper Laguna ">Upper Laguna </option>
                                            <option value="Eastern Laguna">Eastern Laguna</option>
                                            <option value="Central Laguna">Central Laguna</option>
                                            <option value="Luisiana-CavintiDist">Luisiana-CavintiDist</option>
                                            <option value="Greater Laguna/MC">Greater Laguna/MC</option>
                                            <option value="Makiling View">Makiling View</option>
                                            <option value="San Pedro District">San Pedro District</option>
                                            <option value="Binan District">Binan District</option>
                                            <option value="Sta. Rosa">Sta. Rosa</option>
                                            <option value="Cabuyao">Cabuyao</option>
                                            <option value="Central Quezon I">Central Quezon I</option>
                                            <option value="Central Quezon II">Central Quezon II</option>
                                            <option value="Banahaw">Banahaw</option>
                                            <option value="Southern Quezon I">Southern Quezon I</option>
                                            <option value="Southern Quezon II ">Southern Quezon II </option>
                                            <option value="Southern Quezon III">Southern Quezon III</option>
                                            <option value="Bondoc Peninsula I">Bondoc Peninsula I</option>
                                            <option value="Bondoc Peninsula II">Bondoc Peninsula II</option>
                                            <option value="Infanta-Panukulan">Infanta-Panukulan</option>
                                            <option value="Polillo">Polillo</option>
                                            <option value="Marinduque">Marinduque</option>
                                            <option value="North Or. Mindoro">North Or. Mindoro</option>
                                            <option value="Lakeside Or. Mdo.">Lakeside Or. Mdo.</option>
                                            <option value="Central Or. Mdo. ">Central Or. Mdo. </option>
                                            <option value="Pinamalayan District">Pinamalayan District</option>
                                            <option value="Bansud District">Bansud District</option>
                                            <option value="Bongabong District">Bongabong District</option>
                                            <option value="Roxas District">Roxas District</option>
                                            <option value="Gloria District">Gloria District</option>
                                            <option value="South Or, Mindoro">South Or, Mindoro</option>
                                            <option value="North Occ. Mindoro">North Occ. Mindoro</option>
                                            <option value="Cent. Occ. Mdo. I">Cent. Occ. Mdo. I</option>
                                            <option value="Cent Occ. Mdo. II">Cent Occ. Mdo. II</option>
                                            <option value="So-Cent Occ. Mdo.">So-Cent Occ. Mdo.</option>
                                            <option value="So-Cent Occ. Mdo. I">So-Cent Occ. Mdo. I</option>
                                            <option value="So-Cent Occ. Mdo. II">So-Cent Occ. Mdo. II</option>
                                        </select>
                                         @if ($errors->has('district'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('district') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-5">
                                 <div class="form-group">
                                        <div class="col-md-12">
                                        <label>Department</label>
                                        <div class="multi-select-full">
                                            <select class="multiselect" multiple="multiple" name="dept[]">
                                                    <option value="1">Communication Department</option>
                                                    <option value="2">Children's Ministries</option>
                                                    <option value="3">Women's Ministries</option>
                                                    <option value="4">Ministerial</option>
                                                    <option value="5">Stewardship Ministries</option>
                                                    <option value="6">Health Ministries</option>
                                                    <option value="7">Personal Ministries</option>
                                                    <option value="8">Youth Ministries</option>
                                                    <option value="9">Music Ministries</option>
                                                    <option value="10">Family Ministries</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="text-right">
                        <button type="submit" class="btn bg-teal">Save <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>

            </div>
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Disable Account</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>>
                        </ul>
                    </div>
                </div>

                <form method="POST" action="{{ url('disableaccount') }}">
                {{ csrf_field() }}
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>
                            <input type="radio" name="isBan" value="0" @if ($user->isBan == 0) checked @endif>
                                        Activate
                             </label>
                            &nbsp;&nbsp;&nbsp;&nbsp;  
                            <label>
                                    <input type="radio" name="isBan" value="1" @if ($user->isBan == 1) checked @endif>
                                        Deactivate
                                </label>
                            
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="text-right">
                                <button type="submit" class="btn bg-teal">Save <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>      
                </div>
                </form>
            </div>

        </div>
        <div class="col-md-3">
            <div class="thumbnail ">
                <div class="thumb thumb-rounded thumb-slide">
                    <img src="{{Storage::url($user->profile_pic)}}" alt="">
                </div>
                            
                <div class="caption text-center">
                    <h6 class="text-semibold no-margin">{{$user->firstname}} {{$user->middlename}} {{$user->lastname }}</h6>
                    <hr>
                </div>
                
                <div class="content">
                    <label> <i class="icon-envelop3 position-left"></i>Email address - </label> {{ $user->email}}<hr>
                    <label><i class="icon-user-tie position-left"></i>Position - </label> {{$user->position}}<hr>
                    @if ($user->position == 'Director') 
                    <label><i class="icon-stack2"></i> Department ;</label>
                    <ul class="navigation">
                        @foreach ($userdept as $side)
                        <form role="form" method="POST" action="/delete/{{ $side->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <li >{{$dept[$side->dept]}} <button type="submit" class="btn text-warning delete"><i class=" icon-cross2"></i></button></li>
                            
                        </form>
                        @endforeach
                    </ul>
                    @endif

                    @if ($user->position == 'Secretary') 
                    <label><i class="icon-stack2"></i> Department :</label>
                    <ul class="navigation">
                        @foreach ($userdept as $side)
                        <form role="form" method="POST" action="/delete/{{ $side->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <li >{{$dept[$side->dept]}} <button type="submit" class="btn text-warning delete"><i class=" icon-cross2"></i></button></li>
                            
                        </form>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        
        


		
			@include('layouts.footer')	
		</div>
	</div>
<div>		
@endsection