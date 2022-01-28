@extends('layouts.admin')


@section('content')
    
     <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
    </div>
</div>

<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Travel</td>
                        <td>User</td>
                        <td>Weapon</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td>Artifact</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->travel_package->title}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->additional_weapon}}</td>
                        <td>{{$item->transaction_total}}</td>
                        <td>{{$item->transaction_status}}</td>
                        <td>
                         <a href="{{route('transaction.show',$item->id)}}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route('transaction.edit',$item->id)}}" class="btn btn-info">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{route('transaction.destroy',$item->id)}}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td collapse="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>





<!-- /.container-fluid -->

@endsection