@extends('layouts.in')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Master Bagian</h1>
                <!--end::Title-->

                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Form Edit Bagian</li>
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
        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'class' => 'form d-flex flex-column flex-lg-row']) !!}

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
                        <label class="form-label">Nama Bagian</label>
                        {!! Form::text('name', null, array('placeholder' => 'Masukkan Nama Bagian','class' => 'form-control mb-2')) !!}
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="mb-10">
                        <!--begin::Label-->
                        <label class="required fw-bold fs-6 mb-5">Pilih Permission:</label>
                        <!--end::Label-->

                        <!--begin::Input row-->
                        <div class="d-flex flex-column fv-row">
                            @foreach($permission as $value)
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-custom form-check-solid mb-5">
                                    <!--begin::Input-->
                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input me-3')) }}
                                    <!--end::Input-->

                                    <!--begin::Label-->
                                    <label class="form-check-label">
                                        <div class="fw-bolder text-gray-800" style="text-transform: uppercase">{{ $value->name }}</div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                                <!--end::Checkbox-->
                            @endforeach
                        </div>
                        <!--end::Input row-->
                    </div>
                    <!--end::Input group-->

                </div>
                <!--end::Card header-->
            </div>
            <!--end::Meta options-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{ route('roles.index') }}" class="btn btn-light me-5">Batal</a>
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
