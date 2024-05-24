<div x-data="{ open: false }" x-show="open"
    @modal-sweet-alert.window="
    Swal.fire({
        icon: event.detail.icon,
        title: event.detail.title,
        text: event.detail.text || '', // Menambahkan teks jika ada
        footer: event.detail.footer || '' // Menambahkan footer jika ada
    });
    ">
</div>
