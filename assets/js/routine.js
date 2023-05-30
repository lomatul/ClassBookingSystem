function openPopup(popupId) {
    let popup = document.getElementById(popupId);
    popup.classList.add("open-popup");
  
    // Disable buttons in the table
    let tableButtons = document.querySelectorAll("table button:not([onclick='openPopup()'])");
    tableButtons.forEach((button) => {
      button.disabled = true;
    });
  
    // Enable buttons within the popup
    let popupButtons = popup.querySelectorAll("button");
    popupButtons.forEach((button) => {
      button.disabled = false;
    });
  }
  
  function closePopup(popupId) {
    let popup = document.getElementById(popupId);
    popup.classList.remove("open-popup");
  
    // Enable buttons in the table
    let tableButtons = document.querySelectorAll("table button:not([onclick='openPopup()'])");
    tableButtons.forEach((button) => {
      button.disabled = false;
    });
  }