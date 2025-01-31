function openPhoto() {
    const photoUrl = '/path/to/photo.jpg'; 
    window.open(photoUrl, '_blank'); 
    }

document.querySelector('.photoBtn').addEventListener('click', openPhoto);