const inputImage = document.getElementById('input-image');
const canvas = document.getElementById('canvas');
const removeBackgroundButton = document.getElementById('remove-background');
const exportPngButton = document.getElementById('export-png');

inputImage.addEventListener('change', function () {
  const image = new Image();
  image.src = URL.createObjectURL(inputImage.files[0]);
  image.onload = function () {
    canvas.width = image.width;
    canvas.height = image.height;
    const context = canvas.getContext('2d');
    context.drawImage(image, 0, 0);
  };
});

removeBackgroundButton.addEventListener('click', function () {
  // Add code for removing the background of the image here
});

exportPngButton.addEventListener('click', function () {
  const link = document.createElement('a');
  link.download = 'image.png';
  link.href = canvas.toDataURL();
  link.click();
});
