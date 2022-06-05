




// BACK TO TOP BUTTON

const showOnPx = 100;
const backToTopButton = document.querySelector(".back-to-top")

const scrollContainer = () => {
  return document.documentElement || document.body;
};

document.addEventListener("scroll", () => {
  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden")
  } else {
    backToTopButton.classList.add("hidden")
  }
})

const goToTop = () => {
    document.body.scrollIntoView({
      behavior: "smooth",
    });
};

backToTopButton.addEventListener("click", goToTop)


//extra progress bar
const pageProgressBar = document.querySelector(".progress-bar")
document.addEventListener("scroll", () => {
  const scrolledPercentage =
      (scrollContainer().scrollTop /
        (scrollContainer().scrollHeight - scrollContainer().clientHeight)) *
      100;
  
  pageProgressBar.style.width = `${scrolledPercentage}%`
  
  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden");
  } else {
    backToTopButton.classList.add("hidden");
  }
});



// BACK TO TOP BUTTON END___________________________


// FOR LOGIN DROPDOWN


/* Open the dropdown */
function openNav() {
    document.getElementById("profile-drop").style.display = "block";
}

/* Close/hide the dropdown */
function closeNav() {
    document.getElementById("profile-drop").style.display = "none";
}

//Popup Toggle
function togglePopup() {
    document.getElementById("popup-1")
    .classList.toggle("active");
}