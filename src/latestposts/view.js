document.addEventListener('DOMContentLoaded', () => {
	const blocks = document.querySelectorAll('.adi26r-latest-posts');

	blocks.forEach((block) => {
		const postType = block.dataset.postType || 'post';
		const postsList = block.querySelector('.posts-list');

		fetch(`/wp-json/wp/v2/${postType}?per_page=5&_embed`)
			.then((response) => {
				if (!response.ok) {
					throw new Error('Failed to fetch posts');
				}
				return response.json();
			})
			.then((posts) => {
				postsList.innerHTML = '';
				posts.forEach((post) => {
					const listItem = document.createElement('li');
					const thumbnail = post._embedded?.['wp:featuredmedia']?.[0]?.media_details?.sizes?.thumbnail?.source_url || '';
					const date = new Date(post.date).toLocaleDateString();

					listItem.innerHTML = `
						<a href="${post.link}">
							${thumbnail ? `<img src="${thumbnail}" alt="${post.title.rendered}" />` : ''}
							<span>
								<h3>${post.title.rendered}</h3>
								<p>${date}</p>
							</span>
						</a>
					`;
					postsList.appendChild(listItem);
				});
			})
			.catch((error) => {
				postsList.innerHTML = '<li>Error loading posts.</li>';
				console.error(error);
			});
	});
});
