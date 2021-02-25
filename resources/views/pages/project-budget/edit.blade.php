<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Proyek Anggaran Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Proyek Anggaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.project-budget.index') }}">Buat Proyek Anggaran Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-project-budget action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
