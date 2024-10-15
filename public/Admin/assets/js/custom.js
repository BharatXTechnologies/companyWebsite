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