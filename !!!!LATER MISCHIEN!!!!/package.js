function addOption() {
  const select = document.getElementById("options");
  const selectedOption = select.options[select.selectedIndex];
  const outputDiv = document.getElementById("output");

  if (selectedOption.value !== "disabled") {
    // Hide selected item from options
    selectedOption.hidden = true;
    selectedOption.disabled = true;

    // Add selected item to list
    const newItemHTML = `
        <div class="form__package-item">
            <div class="form__package-cell">
                <input class="form__input form__input--mini" type="number" id="${selectedOption.value}" name="${selectedOption.value}" min="1" step="1" required>
            </div>
            <div class="form__package-cell">
                <p>${selectedOption.text}</p>
            </div>
            <div class="form__package-cell">
                <button class="item-list__button" onclick="removePackageItem(this)">X</button>
            </div>
        </div>
    `;

    outputDiv.insertAdjacentHTML("beforeend", newItemHTML);
    select.value = "disabled";
  }
}

function removePackageItem(button) {
  // Remove the package item from the list
  const item = button.parentElement.parentElement;
  const itemInput = item.querySelector("input");
  const id = itemInput.id;
  console.log(id);
  item.remove();

  // Re-show and enable the option in the select element
  const select = document.getElementById("options");
  const options = select.options;
  for (let i = 0; i < options.length; i++) {
    if (options[i].value === id) {
      options[i].hidden = false;
      options[i].disabled = false;
      break;
    }
  }
}
