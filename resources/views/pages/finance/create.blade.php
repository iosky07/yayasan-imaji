<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Finance Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Finance</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">Buat Finance Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance action="create" :type="1"/>
    </div>
</x-app-layout>
