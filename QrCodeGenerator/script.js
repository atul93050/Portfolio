const qrInput = document.getElementById('qr-input');
const generateBtn = document.getElementById('generate-btn');
const qrCode = document.querySelector('.qr-code img');
const downloadBtn = document.getElementById('download-btn');
const errorMsg = document.querySelector('.error-msg');

generateBtn.addEventListener('click', () => {
    if (qrInput.value) {
        qrCode.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrInput.value}`;
        const qrImageUrl = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrInput.value}`;
        document.querySelector('.qr-code').style.display = 'block';
        downloadBtn.style.display = 'inline-block';

        // Download button ke liye QR code image ka blob fetch karna
        fetch(qrImageUrl)
            .then(response => response.blob())
            .then(blob => {
                const blobUrl = URL.createObjectURL(blob);
                downloadBtn.href = blobUrl;
                downloadBtn.download = 'qrcode.png';
            })
            .catch(error => console.error('Error fetching QR code:', error));
        errorMsg.style.display = 'none';

    } else {
        qrCode.style.display = 'none';
        downloadBtn.style.display = 'none';
        errorMsg.style.display = 'block';

    }
});
