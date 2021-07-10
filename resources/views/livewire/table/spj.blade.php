<div>
    <x-data-table :data="$data" :model="$spjs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Judul RAB
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('money')" role="button" href="#">
                    Nominal
                    @include('components.sort-icon', ['field' => 'money'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($spjs as $m)
                <tr x-data="window.__controller.dataTableController({{ $m->id }})">
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->title }}</td>
                    <td>{{ $m->money }}</td>
                    <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{route('admin.spj.edit', $m->id)}}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#" class="mr-3"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                        @if($m->file!=null)
                            <a role="button" href="{{route('admin.download',['rab',$m->id])}}"><i
                                    class="fa fa-16px fa-download"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
