@extends('layouts.app')
@section('style')
    <style>
        html {
            font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
        .btn-info{
            background: #f58634;
            border: 1px solid #f58634;
        }

        h5 {
            font-size: 1.28571429em;
            font-weight: 700;
            line-height: 1.2857em;
            margin: 0;
        }

        .card {
            font-size: 1em;
            overflow: hidden;
            padding: 0;
            border: none;
            border-radius: .28571429rem;
            box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
        }

        .card-block {
            font-size: 1em;
            position: relative;
            margin: 0;
            padding: 1em;
            border: none;
            border-top: 1px solid rgba(34, 36, 38, .1);
            box-shadow: none;
        }

        .card-img-top {
            display: block;
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 1.28571429em;
            font-weight: 700;
            line-height: 1.2857em;
        }

        .card-text {
            clear: both;
            margin-top: .5em;
            color: rgba(0, 0, 0, .68);
        }

        .card-footer {
            font-size: 1em;
            position: static;
            top: 0;
            left: 0;
            max-width: 100%;
            padding: .75em 1em;
            color: rgba(0, 0, 0, .4);
            border-top: 1px solid rgba(0, 0, 0, .05) !important;
            background: #fff;
        }

        .card-inverse .btn {
            border: 1px solid rgba(0, 0, 0, .05);
        }

        .profile {
            position: absolute;
            top: -12px;
            display: inline-block;
            overflow: hidden;
            box-sizing: border-box;
            width: 25px;
            height: 25px;
            margin: 0;
            border: 1px solid #fff;
            border-radius: 50%;
        }

        .profile-avatar {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .profile-inline {
            position: relative;
            top: 0;
            display: inline-block;
        }

        .profile-inline ~ .card-title {
            display: inline-block;
            margin-left: 4px;
            vertical-align: top;
        }

        .text-bold {
            font-weight: 700;
        }

        .meta {
            font-size: 1em;
            color: rgba(0, 0, 0, .4);
        }

        .meta a {
            text-decoration: none;
            color: rgba(0, 0, 0, .4);
        }

        .meta a:hover {
            color: rgba(0, 0, 0, .87);
        }
    </style>
@endsection

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-md-offset-4 col-md-6">
                <form action="{{ url('/search/investment') }}" method="get" class="form-inline">
                    <label>Search for Investment:</label><br/>
                    <input type="text" name="amount" placeholder="{{ $amount }}" style="width: 400px;" class="form-control">
                    <input type="submit" class="btn btn-info">
                </form>
            </div>

        </div>
        <div class="clearfix"></div><br/>
        @include('errors.showerrors')
            <div class="row">
           @if($companies->count() > 0)
               @foreach($companies as $company)
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">
                    <div class="card-block">
                        <h4 class="card-title">{{ $company->company_name }}</h4>

                        <div class="card-text">
                            {{ $company->company_about }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-right">Joined in {{ \Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</span>
                        <span><i class=""></i>
                            @if($company->investments)
                            {{ $company->investments->count() }}
                                @else
                                0
                                @endif
                                investments</span>
                        <br/>
                        <a href="{{ url('/view/company/'.$company->id) }}">View</a>
                    </div>
                </div>
            </div>
                    @endforeach
               @else
                <div class="alert alert-info">
                    No company was found
                </div>
                @endif

            </div>
    </div>
@endsection
