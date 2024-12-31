// hard delete
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});


// soft delete
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.trash-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to move in trash this item!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, move it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});


// change status
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            const status = this.classList.contains('btn-success') ? 'deactivate' : 'activate';

            // SweetAlert dialog
            Swal.fire({
                title: `Are you sure you want to ${status} this technology?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to toggle URL
                    window.location.href = url;
                }
            });
        });
    });
});

// restore all records
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.restore-all-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            // SweetAlert dialog
            Swal.fire({
                title: `Are you sure you want to restore all these data?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to toggle URL
                    window.location.href = url;
                }
            });
        });
    });
});

// permanent Delete record
document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.p-delete-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');

            // SweetAlert dialog
            Swal.fire({
                title: `Are you sure you want to permanently delete this record?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to toggle URL
                    window.location.href = url;restore-all-btn
                }
            });
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const toggleButtons = document.querySelectorAll('.toggle-status-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            const status = this.classList.contains('btn-success') ? 'deactivate' : 'activate';

            // SweetAlert dialog
            Swal.fire({
                title: `Are you sure you want to ${status} this technology?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to toggle URL
                    window.location.href = url;restore-all-btn
                }
            });
        });
    });
});