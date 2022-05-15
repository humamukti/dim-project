@extends('layouts.in')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Beranda
                    <!--begin::Separator-->
                    <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <span class="text-muted fs-7 fw-bold mt-2">Administrator</span>
                    <!--end::Description--></h1>
                <!--end::Title-->
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
    <div class="tns">
        <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false">
            <!--begin::Item-->
            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                <img src="{{ asset('assets/media/gambar/big_thumb.jpg') }}" class="card-rounded shadow mw-100" alt="" />
            </div>
            <!--end::Item-->
            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                <img src="{{ asset('assets/media/gambar/Demand.gif') }}" class="card-rounded shadow mw-100" alt="" />
            </div>
            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                <img src="{{ asset('assets/media/gambar/16fig11.jpg') }}" class="card-rounded shadow mw-100" alt="" />
            </div>
        </div>
    </div>
@endsection

