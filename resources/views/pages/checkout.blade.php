@extends('layouts.checkout')

@section('title')
    Checkout    
@endsection


@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                         <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who is Going?</h1>
                        <p>
                            Go to {{$item->travel_package->title}}, {{$item->travel_package->location}}

                        </p>
                        <div class="attendee">
                            <table
                                class="
                                    table table-responsive-sm
                                    text-center
                                "
                            >
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Region</td>
                                        <td>Visa</td>
                                        <td>Artifact</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($item->details as $detail)
                                  <tr>
                                    <td>
                                        <img
                                            src="https://ui-avatars.com/api/?name={{ $detail->username}}"
                                            height="60"
                                        class="rounded-circle"/>
                                    </td>
                                    <td class="align-middle">
                                        {{$detail->username}}
                                    </td>
                                    <td class="align-middle">
                                        {{$detail->region}}
                                    </td>
                                    <td class="align-middle">
                                        {{$detail->is_visa ? 'On': 'Off'}}
                                    </td>
                                    <td class="align-middle">
                                        {{\Carbon\Carbon::createFromDate($detail->date_time) > \Carbon\Carbon::now()? 'Active' : 'Inactive'}}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{route('checkout-remove', $detail->id)}}">
                                            <img
                                                src="{{url('frontend/image/x.jpg')}}"
                                                alt=""
                                            />
                                        </a>
                                    </td>
                                </tr>
                                  @empty
                                      <tr>
                                          <td colspan="6" class="text-center">
                                              No Visitor
                                          </td>
                                      </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="members mt-3">
                            <h2>Add Member</h2>
                            <form class="form-inline" method="POST" action="{{route('checkout-create',$item->id)}}">
                                @csrf
                                <label for="username" class="sr-only">Name</label>

                                <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="Inputusername"
                                placeholder="Username" style="width:120px">

                                <label for="region" class="sr-only">
                                    Region
                                </label>
                                <input type="text" name="region" class="form-control mb-2 mr-sm-2" style="width:100px"
                                id="region" placeholder="Region">


                                <label for="is_visa" class="sr-only">visa</label>
                                <select
                                    name="is_visa"
                                    id="inputvisa" class="custom-select mb-2 mr-sm-2" required>
                                    <option value="" selected>visa</option>
                                    <option value="1">On</option>
                                    <option value="0">Off</option>
                                </select>

                                <label class="sr-only" for="date_time">DATE & TIME</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input
                                        type="text"
                                        name="date_time"
                                        class="form-control datepicker"
                                        id="date_time"
                                        placeholder="Date & Time"
                                        style="width:120px">
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-add-now mb-2 px-4">
                                    Add Now
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note</h3>
                            <p class="disclaimer mb-0">
                                You are only able to invite member that
                                has registered in Traveler
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2>Information</h2>
                        <table class="information">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right">
                                    {{$item->details->count()}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Addinational Visa</th>
                                <td width="50%" class="text-right">
                                    {{$item->additional_visa}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">
                                    {{$item->travel_package->price}}00 / person
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Sub total</th>
                                <td width="50%" class="text-right">
                                    ${{$item->transaction_total}},00
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Unique Code</th>
                                <td width="50%" class="text-right">
                                    ${{$item->transaction_total}} {{mt_rand(0,99)}}
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <h2>Payment instruction</h2>
                        <p>
                            Please Complete the payment before you
                            continue trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img
                                    src="{{url('frontend/image/primo.jpg')}}"
                                    alt=""
                                    class="bank-image"
                                />
                                <div class="description">
                                    <h3>PT Traveler ID</h3>
                                    <p>
                                        Northland Bank
                                        <br />
                                        1298301730
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="bank-item pb-3">
                                <img
                                    src="{{url('frontend/image/primo.jpg')}}"
                                    alt=""
                                    class="bank-image"
                                />
                                <div class="description">
                                    <h3>PT Traveler ID</h3>
                                    <p>
                                        Northland Bank
                                        <br />
                                        1298301730
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a
                            href="{{route('checkout-success',$item->id)}}"
                            class="btn btn-block btn-join-now mt-4 py-2">
                            I Have Made Payment
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{route('Detail' ,$item->travel_package->slug)}}" class="text-muted">
                            CANCEL BOOKING
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet"href="{{url('frontend/libraries/combined/css/gijgo.min.css')}}"/>
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/combined/js/gijgo.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: "bootstrap4",
            icons: {
                rightIcon:
                    '<img src="{{url('frontend/image/calender.png')}}" alt="" />',
            },
        });
    });
</script>

@endpush