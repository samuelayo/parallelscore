@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Investor or Founder?</label>

                            <div class="col-md-6">
                                <select  type="password" class="form-control" name="type" required onchange="showcompany(this)">
                                    <option value="investor"> Investor </option>
                                     
                                    <option value="founder" @if (session('type')) selected @endif> Founder </option>
                                
                                    
                                    
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div id="showfounder"
                         @if (session('type'))
                         style="display:block;"
                         @else
                         style="display:none;"
                         @endif
                         >
                            <hr/>
                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company_name"  value="{{ old('company_name') }}" >

                                    @if ($errors->has('company_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('company_logo') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Logo</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="company_logo"  value="{{ old('company_logo') }}" >

                                    @if ($errors->has('company_logo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('company_phone') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Phone</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company_phone"  value="{{ old('company_phone') }}" >

                                    @if ($errors->has('company_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('company_amount') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Investment Amount?</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company_amount"  value="{{ old('company_amount') }}" >

                                    @if ($errors->has('company_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('company_url') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Url?</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="company_url"  value="{{ old('company_url') }}" >

                                    @if ($errors->has('company_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('company_about') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">About your company?</label>

                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="company_about"  >
                                    {{ old('company_about') }}
                                    </textarea>

                                    @if ($errors->has('company_about'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_about') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                                   <div class="form-group{{ $errors->has('company_address') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Address</label>

                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="company_address"  >
                                    {{ old('company_address') }}
                                    </textarea>

                                    @if ($errors->has('company_adress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_adress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                                   <div class="form-group{{ $errors->has('company_vision') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Vision</label>

                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="company_vision"  >
                                    {{ old('company_vision') }}
                                    </textarea>

                                    @if ($errors->has('company_vision'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_vision') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                                   <div class="form-group{{ $errors->has('company_mission') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Company Mission</label>

                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="company_mission"  >
                                    {{ old('company_mission') }}
                                    </textarea>

                                    @if ($errors->has('company_mission'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company_mission') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showcompany(element){
if(element.value=="founder"){
document.getElementById('showfounder').style.display="block";
}else{
document.getElementById('showfounder').style.display="none";
}
}
</script>
@endsection
