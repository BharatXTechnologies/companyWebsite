// Custom showNotification function
const showNotification = (type, message) => {
    const notification = $('#notification');
    const notificationMessage = $('#notificationMessage');

    // Set the message
    notificationMessage.text(message);

    // Change the background color based on the type (success, error)
    if (type === 'success') {
        notification.css('background-color', '#4caf50'); 
    } else if (type === 'error') {
        notification.css('background-color', '#f44336'); 
    }

    notification.css('right', '20px');  

    setTimeout(() => {
        notification.css('right', '-300px'); 
    }, 3000); 
}

// image preview

document.getElementById('logo').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});


// banner preview

document.getElementById('banner').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('bannerPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
