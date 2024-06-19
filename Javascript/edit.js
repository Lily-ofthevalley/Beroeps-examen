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
        input.type = "text";
        input.id = "barcode";
        input.name = "barcode";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("product-field--name")) {
        // Product - Name
        input = document.createElement("input");
        input.className = "form__input product-field--name";
        input.type = "text";
        input.id = "name";
        input.name = "name";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
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
      } else if (field.classList.contains("product-field--category")) {
        // Product - Category
        input = document.createElement("select");
        input.className = "form__input product-field--category";
        input.id = "category";
        input.name = "category";
        input.required = true;

        const options = [
          {
            value: "",
            text: "(Kies categorie)",
            hidden: true,
            disabled: true,
            selected: true,
          },
          { value: "1", text: "Aardappelen, groente, fruit" },
          { value: "2", text: "Kaas, vleeswaren" },
          { value: "3", text: "Zuivel, plantaardig en eieren" },
          { value: "4", text: "Bakkerij en banket" },
          { value: "5", text: "Frisdrank, sappen, koffie en thee" },
          { value: "6", text: "Pasta, rijst en wereldkeuken" },
          { value: "7", text: "Soepen, sauzen, kruiden en olie" },
          { value: "8", text: "Snoep, koek, chips en chocolade" },
          { value: "9", text: "Baby, verzorging en hygiëne" },
        ];

        options.forEach((optionData) => {
          const option = document.createElement("option");
          option.value = optionData.value;
          option.textContent = optionData.text;
          if (optionData.hidden) option.hidden = true;
          if (optionData.disabled) option.disabled = true;
          if (optionData.selected) option.selected = true;
          if (optionData.text === field.textContent) option.selected = true;
          input.appendChild(option);
        });
      } else if (field.classList.contains("supplier-field--next")) {
        // Supplier - Next
        input = document.createElement("input");
        input.className = "form__input supplier-field--next";
        input.type = "date";
        input.id = "next";
        input.name = "next";
        input.value = field.textContent;
      } else if (field.classList.contains("supplier-field--company")) {
        // Supplier - Company
        input = document.createElement("input");
        input.className = "form__input supplier-field--company";
        input.type = "text";
        input.id = "company";
        input.name = "company";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("supplier-field--address")) {
        // Supplier - Address
        input = document.createElement("input");
        input.className = "form__input supplier-field--address";
        input.type = "text";
        input.id = "address";
        input.name = "address";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("supplier-field--contact")) {
        // Supplier - Contact
        input = document.createElement("input");
        input.className = "form__input supplier-field--contact";
        input.type = "text";
        input.id = "contact";
        input.name = "contact";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("supplier-field--email")) {
        // Supplier - E-mail
        input = document.createElement("input");
        input.className = "form__input supplier-field--email";
        input.type = "email";
        input.id = "email";
        input.name = "email";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("supplier-field--phone")) {
        // Supplier - Phone
        input = document.createElement("input");
        input.className = "form__input supplier-field--phone";
        input.type = "text";
        input.id = "phone";
        input.name = "phone";
        input.maxLength = 15;
        input.required = true;
        input.value = field.textContent;
      }
      field.replaceWith(input);
    });

    editButton.classList.add("hidden");
    saveButton.classList.remove("hidden");
    deleteButton.classList.add("hidden");
  }

  function handleSave(saveButton) {
    const item = saveButton.closest(".item-list__item-row");
    const inputs = item.querySelectorAll(".form__input");
    const editButton = item.querySelector(".item-list__edit-button--edit");
    const deleteButton = item.querySelector(".item-list__edit-button--delete");

    inputs.forEach((input) => {
      const p = document.createElement("p");
      if (input.tagName.toLowerCase() === "select") {
        const selectedOption = input.options[input.selectedIndex];
        p.textContent = selectedOption.textContent; // Use textContent of selected option
      } else {
        p.textContent = input.value;
      }
      p.classList.add("field");
      if (input.classList.contains("product-field--barcode")) {
        p.classList.add("product-field--barcode");
      } else if (input.classList.contains("product-field--name")) {
        p.classList.add("product-field--name");
      } else if (input.classList.contains("product-field--quantity")) {
        p.classList.add("product-field--quantity");
      } else if (input.classList.contains("product-field--category")) {
        p.classList.add("product-field--category");
      } else if (input.classList.contains("supplier-field--next")) {
        p.classList.add("supplier-field--next");
      } else if (input.classList.contains("supplier-field--company")) {
        p.classList.add("supplier-field--company");
      } else if (input.classList.contains("supplier-field--address")) {
        p.classList.add("supplier-field--address");
      } else if (input.classList.contains("supplier-field--contact")) {
        p.classList.add("supplier-field--contact");
      } else if (input.classList.contains("supplier-field--email")) {
        p.classList.add("supplier-field--email");
      } else if (input.classList.contains("supplier-field--phone")) {
        p.classList.add("supplier-field--phone");
      }
      input.replaceWith(p);
    });

    editButton.classList.remove("hidden");
    saveButton.classList.add("hidden");
    deleteButton.classList.remove("hidden");
  }
});
