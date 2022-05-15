@extends('layouts.in')


@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Master Pegawai</h1>
                <!--end::Title-->

                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Form Input Pegawai Baru</li>
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
        {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form d-flex flex-column flex-lg-row')) !!}
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
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control mb-2" name="name" placeholder="Masukkan Nama Pegawai" />
                        </div>
                        <!--end::Input group-->
                        <div class="mb-10">
                            <label class="form-label">Email Pegawai</label>
                            <input type="text" class="form-control mb-2" name="email" placeholder="Masukkan Email Pegawai" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control mb-2" name="password" placeholder="Masukkan Password Untuk Login" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Confirm Password</label>
                            <input type="text" class="form-control mb-2" name="confirm-password" placeholder="Masukkan Kembali" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Bagian</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control mb-2" name="hp_pegawai" placeholder="Masukkan HP Pegawai" />
                        </div>
                        <div class="mb-10">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control mb-2" name="alamat_pegawai" placeholder="Masukkan Alamat Pegawai" />
                        </div>

                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Meta options-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('users.index') }}" class="btn btn-light me-5">Batal</a>
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
        {!! Form::close() !!}
    </div>

@endsection
