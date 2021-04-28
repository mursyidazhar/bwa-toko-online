@extends('layouts/dashboard')

@section('title')
    Dashboard
@endsection

@section('content')

 <!-- section content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Look what you have made today</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">{{ number_format($revenue) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transaction</div>
                            <div class="dashboard-card-subtitle">{{ number_format($transaction_count) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    @forelse($transaction_data as $data)
                    <a href="{{route('dashboard-transaction-details', $data->id)}}" class="card card-list d-block">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="{{Storage::url($data->product->galleries->first()->photos ?? '')}}" class="w-75" />
                          </div>
                          <div class="col-md-4">{{$data->product->name}}</div>
                          <div class="col-md-3">{{$data->transaction->user->name ?? ''}}</div>
                          <div class="col-md-3">{{$data->created_at ?? ''}}</div>
                          <div class="col-md-1 d-none d-md-block">
                            <img src="images/dashboard/arrow.svg" alt="" />
                          </div>
                        </div>
                      </div>
                    </a>
                    @empty 
                      <p>tidak ada data</p>
                    @endforelse
                  </div>
                </div>
              </div>
    </div>
</div>

@endsection