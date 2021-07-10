<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data jenis anggaran') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Jenis Anggaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.project-budget.index') }}">Ubah data jenis anggaran</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-project-budget action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
