/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./src/latestgalery/view.js ***!
  \**********************************/
document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('.adi26r-latest-gallery');
  blocks.forEach(block => {
    const galleryList = block.querySelector('.latest-gallery');
    fetch(`/wp-json/wp/v2/ai-art-gallery?per_page=5`).then(response => {
      if (!response.ok) {
        throw new Error('Failed to fetch images');
      }
      return response.json();
    }).then(posts => {
      postsList.innerHTML = '';
      posts.forEach(img => {
        const listItem = document.createElement('div');
        listItem.innerHTML = `<a href="${img.link}">${img.title.rendered}</a>`;
        postsList.appendChild(listItem);
      });
    }).catch(error => {
      postsList.innerHTML = '<li>Error loading gallery.</li>';
      console.error(error);
    });
  });
});
/******/ })()
;
//# sourceMappingURL=view.js.map