document.addEventListener("DOMContentLoaded", () => {
  const itemList = document.querySelector(".item-list__items");

  itemList.addEventListener("click", (event) => {
    if (event.target.classList.contains("item-list__button--delete")) {
      handleDelete(event.target);
    } else if (event.target.classList.contains("item-list__button--cancel")) {
      handleCancel(event.target);
    }
  });

  function handleDelete(deleteButton) {
    const item = deleteButton.closest(".item-list__item-row");
    const editButtons = item.querySelector(".item-list__buttons-cell--edit");
    const deleteButtons = item.querySelector(
      ".item-list__buttons-cell--delete"
    );

    editButtons.classList.add("hidden");
    deleteButtons.classList.remove("hidden");
  }

  function handleCancel(cancelButton) {
    const item = cancelButton.closest(".item-list__item-row");
    const editButtons = item.querySelector(".item-list__buttons-cell--edit");
    const deleteButtons = item.querySelector(
      ".item-list__buttons-cell--delete"
    );

    editButtons.classList.remove("hidden");
    deleteButtons.classList.add("hidden");
  }
});
