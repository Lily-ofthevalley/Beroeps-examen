function showMore(button) {
  console.log("running showMore");
  const item = button.parentElement.parentElement.parentElement;
  const itemGrid = item.querySelector(".item-list__grid");
  const showLessButton = item.querySelector(".item-list__button--show-less");

  itemGrid.classList.remove("item-list__grid--max-height");
  showLessButton.classList.remove("hidden");
  button.classList.add("hidden");
}

function showLess(button) {
  console.log("running showLess");
  const item = button.parentElement.parentElement.parentElement;
  const itemGrid = item.querySelector(".item-list__grid");
  const showMoreButton = item.querySelector(".item-list__button--show-more");

  itemGrid.classList.add("item-list__grid--max-height");
  showMoreButton.classList.remove("hidden");
  button.classList.add("hidden");
}
