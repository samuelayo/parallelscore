@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <img src="https://wiki.duraspace.org/download/attachments/31655033/duracloud_logo_12in.png?version=1&modificationDate=1329183208810&api=v2" style="width: 200px"; border-radius: 25px;>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div>
                <h2 style="color: orange; font-weight: 700;" >Company Name</h2>
                @if($company->company_name)
                 <h5>{{$company->company_name}}</h5>
                @else
                 <h5>No company yet</h5>
                @endif
               
            </div>

            <div>
                <h2 style="color: orange; font-weight: 700;" >Mission</h2>
                <h5>My company ltd</h5>
            </div>

            <div>
                <h2 style="color: orange; font-weight: 700;" >Vision</h2>
                <h5>My company ltd</h5>
            </div>

            <div>
                <h2 style="color: orange; font-weight: 700;" > About </h2>
                <h5>My company ltd</h5>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <h2 style="color: orange; font-weight: 700;" >Company's Website</h2>
                <h5>My company ltd</h5>
            </div>
             <div>
                <h2 style="color: orange; font-weight: 700;" >Company's Phone</h2>
                <h5>My company ltd</h5>
            </div>
             <div>
                <h2 style="color: orange; font-weight: 700;" >Investors</h2>
                <h5>My company ltd</h5>
            </div>
        </div>
    </div>
</div>

@endsection