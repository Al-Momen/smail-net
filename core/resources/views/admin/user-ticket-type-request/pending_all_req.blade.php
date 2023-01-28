@extends('admin.layout.master')
@section('title')
    User Manual Ticket-Type
@endsection
@section('page-name')
    User Manual Ticket-Type
@endsection
@php
    $roles = userRolePermissionArray();
@endphp

@section('content')
    <div class="dashboard-title-part">
        <h5 class="title">Dashboard</h5>
        <div href="" class="dashboard-path">
            <a href={{ route('admin.dashboard') }}>
                <span class="main-path">Dashboards</span>
            </a>
            <i class="las la-angle-right"></i>
            <a href="#">
                <span class="active-path g-color">Manual Pending-logs</span>
            </a>
        </div>
        <div class="view-prodact">

            <span></span>

        </div>
    </div>

    <!-- Button trigger modal -->
    <div class="table-content">

        <div class="table-wrapper table-responsive">
            <table class="custom-table table text-white rounded mt-5 ">
                <thead class="text-center" style="color:#7b8191">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Getway name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Trancation</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="color:#7b8191">
                    @if ($allManualTicketTypeRequest->count() == 0)
                        <tr>
                            <td colspan="99" class="text-center">No data found</td>
                        </tr>
                    @endif
                    @foreach ($allManualTicketTypeRequest as $item)
                        <tr>
                            <td class="text-capitalize">{{ $item->user->full_name ?? ' ' }}</td>
                            <td class="text-capitalize">{{ $item->payment_getway ?? ' ' }}</td>
                            <td class="text-capitalize">{{ $item->final_amo ?? ' ' }} {{ $priceCurrency->code ?? ' ' }}</td>
                            <td class="text-capitalize">
                                @php
                                    $date = $item->created_at;
                                    echo date('d/m/Y', strtotime($date));
                                @endphp
                            </td>
                            <td class="text-capitalize">{{ $item->transaction_id ?? ' ' }}</td>
                            <td class="text-capitalize">
                                @if ($item->status == 1)
                                    <span class="badge bg-success"> Approved</span>
                                @elseif($item->status == 2)
                                    <span class="badge bg-warning"> Pending </span>
                                @elseif($item->status == 3)
                                    <span class="badge bg-danger"> Cancelled </span>
                                @else
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.user.manual.ticket.request.view', $item->id) }}"
                                    class="btn btn-primary rounded">
                                    <i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $allManualTicketTypeRequest->links() }}
        </div>
    </div>
    
@endsection
@section('css')
    <style>
        .table-user-img {
            height: 60px;
            width: 60px;
            border-radius: 70px;
        }

        .modal-header .btn-close {
            padding: 0.5rem 0.5rem;
            opacity: 1;
        }

        .modal-title {
            font-size: 20px;
        }

        .form-label {
            font-size: 15px;
        }

        /* Ck-editor css */
        .ck-blurred {
            height: 300px !important;
        }

        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
        .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
            height: 300px;
        }

        /* switch button css */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $('.switch').click(function() {
            $(this).parents('form').submit();
        })
        $('#doller-input')
    </script>
    {{-- toastr --}}
    <script>
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}")
        @endif
    </script>
@endsection