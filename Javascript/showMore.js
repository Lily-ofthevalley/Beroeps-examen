function showMore(button) {
  // All grids
  const itemList = button.parentElement.parentElement.parentElement;
  const itemGrids = itemList.querySelectorAll(".item-list__grid");

  // Current grid
  const item = button.parentElement.parentElement;
  const itemGrid = item.querySelector(".item-list__grid");
  const currentShowLessButton = item.querySelector(
    ".item-list__button--show-less"
  );

  // Check every grid
  itemGrids.forEach((itemGridsItem) => {
    const showLessButton = itemGridsItem.parentElement.querySelector(
      ".item-list__button--show-less"
    );
    const showMoreButton = itemGridsItem.parentElement.querySelector(
      ".item-list__button--show-more"
    );

    // Check if grid has max height, if no, apply it and switch buttons
    if (!itemGridsItem.classList.contains("item-list__grid--max-height")) {
      itemGridsItem.classList.add("item-list__grid--max-height");
      showLessButton.classList.add("hidden");
      showMoreButton.classList.remove("hidden");
    }
  });

  // Show more on current item
  itemGrid.classList.remove("item-list__grid--max-height");
  currentShowLessButton.classList.remove("hidden");
  button.classList.add("hidden");
}

function showLess(button) {
  // Show less on current item
  const item = button.parentElement.parentElement;
  const itemGrid = item.querySelector(".item-list__grid");
  const showMoreButton = item.querySelector(".item-list__button--show-more");

  itemGrid.classList.add("item-list__grid--max-height");
  showMoreButton.classList.remove("hidden");
  button.classList.add("hidden");
}
