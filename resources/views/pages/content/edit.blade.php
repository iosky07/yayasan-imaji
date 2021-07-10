<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data konten') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Konten</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.content.index') }}">Ubah data konten</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-content action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
