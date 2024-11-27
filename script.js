document.getElementById('sendform').addEventListener('submit', async function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    
    let response = await fetch('send.php', {
        method: 'POST',
        body: formData
    });

    let result = await response.text();
    document.getElementById('response').innerText = result;
});
