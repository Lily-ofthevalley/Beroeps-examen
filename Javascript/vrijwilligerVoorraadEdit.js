document.addEventListener("DOMContentLoaded", () => {
    const itemList = document.querySelector(".item-list__items");
  
    itemList.addEventListener("click", (event) => {
      if (event.target.classList.contains("item-list__edit-button--edit")) {
        handleEdit(event.target);
      } else if (
        event.target.classList.contains("item-list__edit-button--save")
      ) {
        handleSave(event.target);
      }
    });
  
function handleEdit(editButton) {
    const item = editButton.closest(".item-list__item-row");
    const fields = item.querySelectorAll(".field");
    const saveButton = item.querySelector(".item-list__edit-button--save");
    const deleteButton = item.querySelector(".item-list__edit-button--delete");
  
    fields.forEach((field) => {
      let input;
  
      if (field.classList.contains("product-field--barcode")) {
        // Product - Barcode
        input = document.createElement("input");
        input.className = "form__input product-field--barcode";
        input.id = "barcode";
        input.name = "barcode";
        input.value = field.textContent;
        input.readOnly = true;

        input.style.border = 'none';
        input.style.background = 'transparent';
        input.style.color = 'inherit';
        input.style.fontSize = 'inherit';

        field.replaceWith(input);
      } else if (field.classList.contains("product-field--quantity")) {
        // Product - Quantity
        input = document.createElement("input");
        input.className = "form__input product-field--quantity";
        input.type = "number";
        input.id = "quantity";
        input.name = "quantity";
        input.min = 0;
        input.maxLength = 10;
        input.required = true;
        input.value = field.textContent;
  
        field.replaceWith(input);
      }
    });
  
    editButton.classList.add("hidden");
    saveButton.classList.remove("hidden");
    deleteButton.classList.add("hidden");
  }
  
  });
  