document.addEventListener("DOMContentLoaded", () => {
  const itemList = document.querySelector(".item-list__items");

  itemList.addEventListener("click", (event) => {
    if (event.target.classList.contains("item-list__button--edit")) {
      handleEdit(event.target);
    } else if (event.target.classList.contains("item-list__button--save")) {
      handleSave(event.target);
    } else if (event.target.classList.contains("item-list__button--delete")) {
      handleDelete(event.target);
    } else if (event.target.classList.contains("item-list__button--cancel")) {
      handleCancel(event.target);
    }
  });

  function handleEdit(editButton) {
    const item = editButton.closest(".item-list__item-row");
    const fields = item.querySelectorAll(".field");
    const saveButton = item.querySelector(".item-list__button--save");
    const deleteButton = item.querySelector(".item-list__button--delete");

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
      } else if (field.classList.contains("supplier-field--postalCode")) {
        // Supplier - Postal code
        input = document.createElement("input");
        input.className = "form__input supplier-field--postalCode";
        input.type = "text";
        input.id = "postalCode";
        input.name = "postalCode";
        input.maxLength = 6;
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
      } else if (field.classList.contains("customer-field--name")) {
        // Customer - Name
        input = document.createElement("input");
        input.className = "form__input customer-field--name";
        input.type = "text";
        input.id = "name";
        input.name = "name";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--address")) {
        // Customer - Address
        input = document.createElement("input");
        input.className = "form__input customer-field--address";
        input.type = "text";
        input.id = "address";
        input.name = "address";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--postalCode")) {
        // Customer - Postal code
        input = document.createElement("input");
        input.className = "form__input customer-field--postalCode";
        input.type = "text";
        input.id = "postalCode";
        input.name = "postalCode";
        input.maxLength = 6;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--phone")) {
        // Customer - Phone
        input = document.createElement("input");
        input.className = "form__input customer-field--phone";
        input.type = "text";
        input.id = "phone";
        input.name = "phone";
        input.maxLength = 15;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--email")) {
        // Customer - E-mail
        input = document.createElement("input");
        input.className = "form__input customer-field--email";
        input.type = "email";
        input.id = "email";
        input.name = "email";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--address")) {
        // Customer - Address
        input = document.createElement("input");
        input.className = "form__input customer-field--address";
        input.type = "text";
        input.id = "address";
        input.name = "address";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("customer-field--members")) {
        // Customer - Members

        // Extract the data from the existing structure
        const aantalVolwassenen = field.children[0].innerText;
        const aantalKinderen = field.children[2].innerText;
        const aantalBabys = field.children[4].innerText;

        // Create the new container
        input = document.createElement("div");
        input.className = "customer-field--members";

        // Create the input for adults
        const adultsInput = document.createElement("input");
        adultsInput.className = "form__input form__input--mini";
        adultsInput.type = "number";
        adultsInput.id = "adults";
        adultsInput.name = "adults";
        adultsInput.min = "0";
        adultsInput.required = true;
        adultsInput.value = aantalVolwassenen;

        const adultsLabel = document.createElement("p");
        adultsLabel.innerText = " Volwassenen, ";

        // Create the input for children
        const childrenInput = document.createElement("input");
        childrenInput.className = "form__input form__input--mini";
        childrenInput.type = "number";
        childrenInput.id = "children";
        childrenInput.name = "children";
        childrenInput.min = "0";
        childrenInput.required = true;
        childrenInput.value = aantalKinderen;

        const childrenLabel = document.createElement("p");
        childrenLabel.innerText = " Kinderen, ";

        // Create the input for babies
        const babiesInput = document.createElement("input");
        babiesInput.className = "form__input form__input--mini";
        babiesInput.type = "number";
        babiesInput.id = "babies";
        babiesInput.name = "babies";
        babiesInput.min = "0";
        babiesInput.required = true;
        babiesInput.value = aantalBabys;

        const babiesLabel = document.createElement("p");
        babiesLabel.innerText = " Baby's";

        // Append all elements to the new container
        input.appendChild(adultsInput);
        input.appendChild(adultsLabel);
        input.appendChild(childrenInput);
        input.appendChild(childrenLabel);
        input.appendChild(babiesInput);
        input.appendChild(babiesLabel);
      } else if (field.classList.contains("customer-field--wishes")) {
        // Customer - Wishes
        input = document.createElement("select");
        input.className = "form__input customer-field--wishes";
        input.id = "wishes";
        input.name = "wishes";
        input.required = true;

        const options = [
          { value: "", text: "---" },
          { value: "Geen varkensvlees", text: "Geen varkensvlees" },
          { value: "Vegetarisch", text: "Vegetarisch" },
          { value: "Veganistisch", text: "Veganistisch" },
        ];

        options.forEach((optionData) => {
          const option = document.createElement("option");
          option.value = optionData.value;
          option.textContent = optionData.text;
          if (optionData.text === field.textContent) option.selected = true;
          input.appendChild(option);
        });
      } else if (field.classList.contains("customer-field--allergies")) {
        // Customer - Allergies
        input = document.createElement("input");
        input.className = "form__input customer-field--allergies";
        input.type = "text";
        input.id = "allergies";
        input.name = "allergies";
        input.maxLength = 45;
        input.value = field.textContent;
      } else if (field.classList.contains("user-field--firstName")) {
        // User - First name
        input = document.createElement("input");
        input.className = "form__input user-field--firstName";
        input.type = "text";
        input.name = "Voornaam";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("user-field--lastName")) {
        // User - Last name
        input = document.createElement("input");
        input.className = "form__input user-field--lastName";
        input.type = "text";
        input.name = "Achternaam";
        input.maxLength = 90;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("user-field--phone")) {
        // User - Phone
        input = document.createElement("input");
        input.className = "form__input user-field--phone";
        input.type = "text";
        input.name = "TelefoonNummer";
        input.maxLength = 15;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("user-field--email")) {
        // User - E-mail
        input = document.createElement("input");
        input.className = "form__input user-field--email";
        input.type = "email";
        input.name = "Email";
        input.maxLength = 45;
        input.required = true;
        input.value = field.textContent;
      } else if (field.classList.contains("user-field--role")) {
        // User - Role
        input = document.createElement("select");
        input.className = "form__input user-field--role";
        input.name = "Rol";
        input.required = true;

        const options = [
          { value: "Administrator", text: "Administrator" },
          { value: "Magazijn medewerker", text: "Magazijn medewerker" },
          { value: "Vrijwilliger", text: "Vrijwilliger" },
        ];

        options.forEach((optionData) => {
          const option = document.createElement("option");
          option.value = optionData.value;
          option.textContent = optionData.text;
          if (optionData.text === field.textContent) option.selected = true;
          input.appendChild(option);
        });
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
    const editButton = item.querySelector(".item-list__button--edit");
    const deleteButton = item.querySelector(".item-list__button--delete");
    const customerFieldMembers = item.querySelector(".customer-field--members");

    inputs.forEach((input) => {
      const p = document.createElement("p");
      if (input.tagName.toLowerCase() === "select") {
        const selectedOption = input.options[input.selectedIndex];
        p.textContent = selectedOption.textContent;
      } else {
        p.textContent = input.value;
      }

      // // Reset classes
      // p.classList.add("field");
      // if (input.classList.contains("product-field--barcode")) {
      //   p.classList.add("product-field--barcode");
      // } else if (input.classList.contains("product-field--name")) {
      //   p.classList.add("product-field--name");
      // } else if (input.classList.contains("product-field--quantity")) {
      //   p.classList.add("product-field--quantity");
      // } else if (input.classList.contains("product-field--category")) {
      //   p.classList.add("product-field--category");
      // } else if (input.classList.contains("supplier-field--next")) {
      //   p.classList.add("supplier-field--next");
      // } else if (input.classList.contains("supplier-field--company")) {
      //   p.classList.add("supplier-field--company");
      // } else if (input.classList.contains("supplier-field--address")) {
      //   p.classList.add("supplier-field--address");
      // } else if (input.classList.contains("supplier-field--postalCode")) {
      //   p.classList.add("supplier-field--postalCode");
      // } else if (input.classList.contains("supplier-field--contact")) {
      //   p.classList.add("supplier-field--contact");
      // } else if (input.classList.contains("supplier-field--email")) {
      //   p.classList.add("supplier-field--email");
      // } else if (input.classList.contains("supplier-field--phone")) {
      //   p.classList.add("supplier-field--phone");
      // } else if (input.classList.contains("customer-field--name")) {
      //   p.classList.add("customer-field--name");
      // } else if (input.classList.contains("customer-field--phone")) {
      //   p.classList.add("customer-field--phone");
      // } else if (input.classList.contains("customer-field--email")) {
      //   p.classList.add("customer-field--email");
      // } else if (input.classList.contains("customer-field--address")) {
      //   p.classList.add("customer-field--address");
      // } else if (input.classList.contains("customer-field--postalCode")) {
      //   p.classList.add("customer-field--postalCode");
      // } else if (input.classList.contains("customer-field--wishes")) {
      //   p.classList.add("customer-field--wishes");
      // } else if (input.classList.contains("user-field--firstName")) {
      //   p.classList.add("user-field--firstName");
      // } else if (input.classList.contains("user-field--lastName")) {
      //   p.classList.add("user-field--lastName");
      // } else if (input.classList.contains("user-field--phone")) {
      //   p.classList.add("user-field--phone");
      // } else if (input.classList.contains("user-field--email")) {
      //   p.classList.add("user-field--email");
      // } else if (input.classList.contains("user-field--role")) {
      //   p.classList.add("user-field--role");
      // }
      // input.replaceWith(p);
    });

    // Reset Customer - Members classes
    // if (customerFieldMembers) {
    //   customerFieldMembers.classList.add("field");
    //   customerFieldMembers.classList.add("customer-field--members");
    //   const customerFieldMembersChildren =
    //     customerFieldMembers.querySelectorAll(".field");
    //   customerFieldMembersChildren.forEach((child) => {
    //     child.classList.remove("field");
    //   });
    // }

    editButton.classList.remove("hidden");
    saveButton.classList.add("hidden");
    deleteButton.classList.remove("hidden");
  }
});

function handleDelete(deleteButton) {
  const item = deleteButton.closest(".item-list__item-row");
  const editButtons = item.querySelector(".item-list__buttons-cell--edit");
  const deleteButtons = item.querySelector(".item-list__buttons-cell--delete");

  editButtons.classList.add("hidden");
  deleteButtons.classList.remove("hidden");
}

function handleCancel(cancelButton) {
  const item = cancelButton.closest(".item-list__item-row");
  const editButtons = item.querySelector(".item-list__buttons-cell--edit");
  const deleteButtons = item.querySelector(".item-list__buttons-cell--delete");

  editButtons.classList.remove("hidden");
  deleteButtons.classList.add("hidden");
}
