let previewContainer = document.querySelector('.bedrooms-preview');
let previewBox = previewContainer.querySelectorAll('.preview');

document.querySelectorAll('.bedrooms-container .bedroom').forEach(bedrooms =>{
  bedrooms.onclick = () =>{
    previewContainer.style.display = 'flex';
    let name = bedrooms.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name === target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    previewContainer.style.display = 'none';
  };
});