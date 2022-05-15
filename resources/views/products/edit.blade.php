@extends('layouts.in')


@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Master Barang</h1>
                <!--end::Title-->

                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Form Edit Barang</li>
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
        <form class="form d-flex flex-column flex-lg-row" action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!--begin::Meta options-->
                <div class="card card-flush py-4">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control mb-2" name="nama_barang" value="{{ $product->nama_barang }}" placeholder="Masukkan Nama Barang" />
                        </div>
                        <!--end::Input group-->
                        <div class="mb-10">
                            <label class="form-label">Harga Barang</label>
                            <input type="text" class="form-control mb-2" name="harga_barang" value="{{ $product->harga_barang }}" placeholder="Masukkan Harga Barang" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Biaya Penyimpanan</label>
                            <input type="text" class="form-control mb-2" name="biaya_penyimpanan" value="{{ $product->biaya_penyimpanan }}" placeholder="Masukkan Biaya Penyimpanan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Periode Permintaan</label>
                            <input type="text" class="form-control mb-2" name="periode_permintaan" value="{{ $product->periode_permintaan }}" placeholder="Masukkan Periode Permintaan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control mb-2" name="satuan" value="{{ $product->satuan }}" placeholder="Masukkan Jumlah Satuan" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Konversi</label>
                            <input type="text" class="form-control mb-2" name="konversi" value="{{ $product->konversi }}" placeholder="Masukkan Jumlah Konversi" />
                        </div>

                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Meta options-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('products.index') }}" class="btn btn-light me-5">Batal</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>

        </form>
    </div>

@endsection
