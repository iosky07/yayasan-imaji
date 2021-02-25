<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Tipe Anggaran Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tipe Anggaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.type-budget.index') }}">Buat Tipe Anggaran Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-type-budget action="create" :type="1"/>
    </div>
</x-app-layout>
