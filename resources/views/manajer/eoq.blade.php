@extends('layouts.in')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Tabel</h1>
                <!--end::Title-->

                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">EOQ</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!-- Title -->
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-bordered">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th> </th>
                        <th class="min-w-125px"> Nama Barang </th>
                        <th class="min-w-125px"> Harga Barang </th>
                        <th class="min-w-125px"> Jumlah Pesanan </th>
                        <th class="min-w-125px"> Biaya Penyimpanan </th>
                        <th class="min-w-125px"> Permintaan per Periode </th>
                        <th class="min-w-125px"> Biaya Tiap Pemesanan </th>
                        <th class="min-w-125px"> EOQ </th>
                        <th class="min-w-125px"> Pembelian Optimum </th>
                        <th class="min-w-125px"> Daur Pembelian </th>
                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-600">
                    @foreach ($eoq as $key => $e)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $e->nama_barang }}</td>
                            <td>{{ $e->harga_barang }}</td>
                            <td>{{ $e->pesan }}</td>
                            <td>{{ $e->H }}</td>
                            <td>{{ $e->R }}</td>
                            <td>{{ $e->C }}</td>
                            <td>{{ $e->EOQ }}</td>
                            <td>{{ $e->pembelian_optimum }}</td>
                            <td>{{ $e->daur_pembelian }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
