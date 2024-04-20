
    document.addEventListener("DOMContentLoaded", function () {
        const openModalBtn = document.getElementById("openModalBtn");
        const modal = document.getElementById("myModal");
        const closeModalBtn = document.getElementsByClassName("close")[0];
    
        openModalBtn.onclick = function () {
            modal.style.display = "block";
        }
    
        closeModalBtn.onclick = function () {
            modal.style.display = "none";
        }
    
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    });
    

  
    document.addEventListener("DOMContentLoaded", function () {
        const productImageInput = document.getElementById("productImage");
        const imageListContainer = document.getElementById("imageList");
    
        let selectedImages = [];
    
        productImageInput.addEventListener("change", function (event) {
            imageListContainer.innerHTML = "";
            selectedImages = [];
    
            const files = event.target.files;
            if (files) {
                for (let i = 0; i < Math.min(files.length, 4); i++) {
                    const file = files[i];
                    const reader = new FileReader();
    
                    reader.onload = function (e) {
                        const imagePreview = document.createElement("div");
                        imagePreview.classList.add("image-preview");
    
                        const image = new Image();
                        image.src = e.target.result;
                        image.classList.add("preview-image");
    
                        imagePreview.appendChild(image);
                        imageListContainer.appendChild(imagePreview);
    
                        selectedImages.push(file);
                    };
    
                    reader.readAsDataURL(file);
                }
            }
        });
    });
     