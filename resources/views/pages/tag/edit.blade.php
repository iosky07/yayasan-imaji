<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ubah data tag') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tag</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Ubah data tag</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-tag action="update" dataId="{{$id}}"/>
    </div>
</x-app-layout>
