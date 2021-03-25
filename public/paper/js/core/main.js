document.addEventListener('DOMContentLoaded', () => {
    axios.defaults.withCredentials = true;
    console.log('axios initialized')
})

const checkFullPageBackgroundImage = () => {
    $page = $('.full-page');
    image_src = $page.data('image');

    if (image_src !== undefined) {
        image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>';
        $page.append(image_container);
    }
}

const confirmDelete = (id) => {
    console.log(id)
    Swal.fire({
        title: 'Bent U zeker?',
        text: "U zal dit niet kunnen terugdraaien!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ja, verwijder het!',
        cancelButtonText: 'Nee, verwijder niet!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your bestand is verwijderd.',
                'success'
            )
            document.querySelector(`#delete_form_${id}`).submit()
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
                'Cancelled',
                'Uw bestand is niet verwijderd :)',
                'error'
            )
        }
    })
}