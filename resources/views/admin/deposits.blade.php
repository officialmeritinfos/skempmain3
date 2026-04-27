@extends('admin.base')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="text-center mt-3 mb-3">
                    <a href="{{route('admin.deposit.index')}}" class="btn btn-outline-warning mt-2 mb-2">Pending Deposits</a>
                    <a href="{{route('admin.deposit.all')}}" class="btn btn-success">View All Deposits</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Asset</th>
                        <th>Deposit Ref</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $deposit)
                        @inject('option','App\Defaults\Custom')
                        <tr>
                            <td>{{$option->getInvestor($deposit->user)}}</td>
                            <td>{{$deposit->reference}}</td>
                            <td>{{number_format($deposit->amount,2)}}</td>
                            <td>{{$deposit->asset}}</td>
                            <td>{{$deposit->paymentRef}}</td>
                            <td>{{$deposit->created_at}}</td>
                            <td>
                                @switch($deposit->status)
                                    @case(1)
                                    <span class="badge badge-success">Completed</span>
                                    @break
                                    @case(2)
                                    <span class="badge badge-info">Pending</span>
                                    @break
                                    @case(3)
                                    <span class="badge badge-danger">Cancelled</span>
                                    @break
                                    @case(4)
                                    <span class="badge badge-primary">Payment Submitted</span>
                                    @break
                                    @default
                                    <span class="badge badge-dark">Partial Payment</span>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{route('admin.deposit_detail',['id'=>$deposit->id])}}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i> View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Asset</th>
                        <th>Deposit Ref</th>
                        <th>Date Initiated</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
