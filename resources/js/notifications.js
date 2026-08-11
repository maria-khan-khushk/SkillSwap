document.addEventListener('DOMContentLoaded', () => {

    const userId = document
        .querySelector('meta[name="user-id"]')
        ?.getAttribute('content');

    if (!userId) {
        return;
    }

    window.Echo
        .private(`user.${userId}`)
        .listen('.skill-request-updated', (event) => {

            console.log('Real-time notification received:', event);

            alert(event.message);
        });

});