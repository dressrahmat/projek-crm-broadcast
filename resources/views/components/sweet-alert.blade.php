<div
    x-data="{open: false}"
    x-show="open"
    @sweet-alert.window="
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('onmouseenter', Swal.stopTimer);
          toast.addEventListener('onmouseleave', Swal.resumeTimer);
        }
      }).fire({
        icon: event.detail.icon,
        title: event.detail.title,
      });
    "
>

</div>