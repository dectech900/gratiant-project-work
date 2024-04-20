
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
    

  
    