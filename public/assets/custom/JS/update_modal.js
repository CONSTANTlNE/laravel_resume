document.addEventListener('DOMContentLoaded', function () {


// Function to open the modal
    function openModal(index) {
        const indexAsString = index.toString();
        console.log('Index:', indexAsString);
        let modal2 = document.getElementById('modal2_' + indexAsString);
        console.log(modal2)
        modal2.style.display = 'block';
    }

// Function to close the modal
    function closeModal(index) {
        const indexAsString = index.toString();
        let modal2 = document.getElementById('modal2_' + indexAsString);
        modal2.style.display = 'none';
    }

    // Event delegation for open and close buttons
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('openModalBtn2')) {

            const index = event.target.getAttribute('data-modal-target2');

            openModal(index);
        }

        if (event.target.classList.contains('closeModalBtn2')) {
            const index = event.target.getAttribute('data-modal-target2');
            closeModal(index);
        }
    });


// Attach event listener to close confirmation dialog buttons
    document.addEventListener('click', function (event) {
        if (event.target.id === 'cancelConfirmBtn2') {
            const index = event.target.getAttribute('data-modal-target2');
            closeModal(index);
        }
    });
});

