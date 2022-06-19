function notif(status, title, message, redirect=''){
    if (status && title && message) {
        if (!redirect) {
            Swal.fire({
                icon: status,
                title: title,
                html: message
            })
            
        } else {
            Swal.fire({
                icon: status,
                title: title,
                html: message,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Check Data',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    window.location.replace(redirect);
                }
            });
        }
    }

}
