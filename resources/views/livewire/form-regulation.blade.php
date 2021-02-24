<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{ $action }}">

        <x-input type="text" title="Kode" model="regulation.code"/>

        <x-input type="text" title="Judul" model="regulation.title"/>

        <x-input type="text" title="Nomor" model="regulation.number"/>

        <x-input type="text" title="Tahun" model="regulation.year"/>

        <x-input type="text" title="Tajuk" model="regulation.clickbait"/>

        <x-input type="text" title="Tempat Penetapan" model="regulation.determination_place"/>

        <x-date title="Tanggal Penetapan" model="regulation.determination_date" type="datepicker"/>

        <x-date title="Tanggal Pengundang" model="regulation.invitation_date" type="datepicker"/>

        <x-date title="Tanggal Berlaku" model="regulation.effective_date" type="datepicker"/>

        <x-input type="text" title="Lokasi" model="regulation.location"/>

        <x-input type="text" title="Sumber" model="regulation.source"/>

        <x-input type="text" title="Bahasa" model="regulation.language"/>

        <x-input type="text" title="Bidang Hukum" model="regulation.law_field"/>

        <x-select :options="$optionStatus" :selected="$regulation['status']" title="Status" model="regulation.status"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.regulation.index')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
</script>
