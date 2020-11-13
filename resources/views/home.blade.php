@extends('layouts.app')

@section('content')
    <div class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Expire Date</th>
                            <th>Remaining Days</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ date_format(date_create(Auth::user()->expire_date), 'd-M-Y') }}</td>
                            <td>{{ date_diff(date_create(Auth::user()->expire_date), date_create(\Illuminate\Support\Carbon::now()))->format("%d Days") }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{Auth::user()->status==1?'Active':'Inactive'}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if(Auth::user()->status == 1)
                            <button class="btn btn-success" disabled>Activate</button>
                            <button class="btn btn-primary" id="report">Report</button>
                        @else
                            <a id="activation" href="{{ route('pay') }}" class="btn btn-warning">Active Account</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#report', function () {
            $('.modal').modal('show');
        });
    </script>
@endsection
