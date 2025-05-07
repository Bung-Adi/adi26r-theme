document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('.adi26r-latest-gallery');
  blocks.forEach((block) => {
    const galleryList = block.querySelector('.latest-gallery');

    fetch(`/wp-json/wp/v2/ai-art-gallery?per_page=5`)
    .then((response) => {
      if (!response.ok) {
        throw new Error('Failed to fetch images');
      }
      return response.json();
    })
    .then((posts) => {
      galleryList.innerHTML = ''; // Fix variable name
      posts.forEach((img) => {
        const listItem = document.createElement('div');
        listItem.innerHTML = `<a href="${img.link}">${img.title.rendered}</a>`;
        galleryList.appendChild(listItem); // Fix variable name
      });
    })
    .catch((error) => {
      galleryList.innerHTML = '<div>Error loading gallery.</div>'; // Fix variable name
      console.error(error);
    });
  });
});