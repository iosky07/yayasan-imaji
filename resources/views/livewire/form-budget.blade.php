<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{ $action }}">

        <x-input type="text" title="Judul" model="budgy.title"/>

        <x-input type="number" title="Anggaran" model="budgy.money"/>

        <x-select :options="$optionProjects" :selected="$budgy['project_id']" title="Project" model="budgy.project_id"/>

        <x-select :options="$optionTypes" :selected="$budgy['type_id']" title="Tipe" model="budgy.type_id"/>

        <x-select :options="$optionStatuses" :selected="$budgy['status_id']" title="Status" model="budgy.status_id"/>

        <x-input type="file" title="Masukkan file lampiran" model="file"/>
        <div wire:loading wire:target="file">
            Proses upload...
        </div>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.budget.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
