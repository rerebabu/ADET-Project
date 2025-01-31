document.querySelector('.connectBtn').addEventListener('click', function () {
    alert('Connecting to the user...');
    });

function openPhoto() {
    const photoUrl = '/path/to/photo.jpg'; 
    window.open(photoUrl, '_blank'); 
    }

document.querySelector('.photoBtn').addEventListener('click', openPhoto);
