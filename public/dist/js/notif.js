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

function delete_data(url){
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'POST',
                url: url,
                data: { 
                    [csrfName]: csrfHash 
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data) {
                        notif(data.status, data.title, $data.message);
                    }
                },
                error: function(xhr, status, error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            });
        }
    });
}
