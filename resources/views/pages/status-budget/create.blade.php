<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Status Anggaran Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Status Anggaran</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.status-budget.index') }}">Buat Status Anggaran Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-status-budget action="create" :type="1"/>
    </div>
</x-app-layout>
