<div x-data="{ open: false }"
    @modal-otp-fonnte.window="
        const icon = event.detail.icon; 
        const title = event.detail.title;
        const text = event.detail.text;
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
            confirmButtonColor: '#3085d6'
        });
    ">
</div>
