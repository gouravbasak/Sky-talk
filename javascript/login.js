const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //prevent from submission
}

continueBtn.onclick = ()=>{
    //ajax part
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "backend/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="users.php";
              }else{
                
                errorText.textContent = data;
                errorText.style.display = "block";
                
              }
          }
      }
    }
    // sending form data to backend through php
    let formData = new FormData(form);
    xhr.send(formData);
}
