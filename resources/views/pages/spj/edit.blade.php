<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data SPJ') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">SPJ</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.spj.index') }}">Ubah data SPJ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-spj action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
