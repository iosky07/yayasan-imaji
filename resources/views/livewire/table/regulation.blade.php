<div>
    <x-data-table :data="$data" :model="$regulations">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Judul
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                    @include('components.sort-icon', ['field' => 'status'])
                </a></th>
                <th><a wire:click.prevent="sortBy('code')" role="button" href="#">
                    Kode
                    @include('components.sort-icon', ['field' => 'code'])
                </a></th>
                <th><a wire:click.prevent="sortBy('determination_place')" role="button" href="#">
                     Tempat Dibuat
                     @include('components.sort-icon', ['field' => 'determination_place'])
                </a></th>
                <th><a wire:click.prevent="sortBy('determination_date')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'determination_date'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($regulations as $r)
                <tr x-data="window.__controller.dataTableController({{ $r->id }})">
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->title }}</td>
                    <td>{{ $r->status }}</td>
                    <td>{{ $r->code }}</td>
                    <td>{{ $r->determination_place }}</td>
                    <td>{{ $r->determination_date }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('admin.regulation.edit', $r->id)}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
