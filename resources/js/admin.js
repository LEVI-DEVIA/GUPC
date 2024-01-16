// Initialisation
$(document).ready(function() {
    // Get the list of connected users
    $.ajax({
        url: '{{ route('admin.users.connected') }}',
        success: function(data) {
            // Update the table
            $('#connected-users').html(data);
        }
    });

    // Add a listener to the "add-user" button
    $('#add-user').click(function() {
        // Redirect to the user creation page
        // Redirect to the user creation page
    window.location.href = new URL(route('admin.users.create')).toString();
    });

    // Add a listener to the "add-permission" button
    $('#add-permission').click(function() {
        // Redirect to the permission creation page
        // Redirect to the user creation page
    window.location.href = new URL(route('admin.users.create')).toString();

    });
});
