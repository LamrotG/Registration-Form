function toggleMenu(){
  document.getElementById("dropdownMenu").classList.toggle("show");
}

window.onclick = function(event){
  if (!event.target.matches('.profile-icon')) {
    let dropdown = document.getElementById("dropdownMenu");
    if (dropdown.classList.contains('show')) {
      dropdown.classList.remove('show');
    }
  }
}



