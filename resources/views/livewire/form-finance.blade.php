<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{ $action }}">

        <x-input type="text" title="Judul" model="financy.title"/>

        <x-select :options="$optionTypes" :selected="$financy['type_id']" title="Tipe" model="financy.type_id"/>

        <x-input type="text" title="Anggaran" model="financy.money"/>

        <x-input type="text" title="PIC(Internal)" model="financy.pic_internal"/>

        <x-input type="text" title="PIC(Eksternal)" model="financy.pic_external"/>

        <x-date title="Tanggal Acara" model="financy.publish_date" type="datepicker"/>

        <x-input type="text" title="Note" model="financy.note"/>

        <x-input type="file" title="File" model="financy.file"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.finance.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
