<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production

    Pusher.logToConsole = true;

    var pusher = new Pusher('be0b46868518e6133068', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('notifications-channel');
    channel.bind('exam-added', function(data) {
        toastr.success('New exam added!')
    });
</script>
