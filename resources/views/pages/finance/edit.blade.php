<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data RAB') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">RAB</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.finance.index') }}">Buat RAB Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-finance action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
