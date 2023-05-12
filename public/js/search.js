document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.form-control');
    const searchButton = document.querySelector('.btn-outline-light');

    searchButton.addEventListener('click', event => {
        event.preventDefault();
        performSearch(searchInput.value, 1);
    });

    searchInput.addEventListener('input', event => {
        event.preventDefault();
        if (searchInput.value.trim() !== '') {
            performSearch(searchInput.value, 1);
        } else {
            // Clear results if input is empty
            const searchResultsContainer = document.getElementById('search-results-container');
            searchResultsContainer.innerHTML = '';
        }
    });
});

async function performSearch(query, page) {
    const apiKey = '8295dbb4116ffc5b458cb9378ac368ea';
    const url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${encodeURIComponent(query)}&page=${page}`;

    const response = await fetch(url);
    const data = await response.json();

    displayResults(data.results, data.total_pages, query, page);
}

function displayResults(movies, totalPages, query, currentPage) {
    // Get the search results container
    const searchResultsContainer = document.getElementById('search-results-container');

    // Clear previous search results
    searchResultsContainer.innerHTML = '';

    // Create a container for the search results
    const newSearchResultsContainer = document.createElement('div');
    newSearchResultsContainer.id = 'search-results';
    newSearchResultsContainer.className = 'container mt-3';

    // Iterate through movies and display them
    for (const movie of movies.slice(0, 3)) {
        const movieElement = document.createElement('div');
        movieElement.className = 'media border p-3 mb-2';

        const img = document.createElement('img');
        if (movie.poster_path) {
            img.src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
        } else {
            img.src = `https://www.nbmchealth.com/wp-content/uploads/2018/04/default-placeholder.png`;
        }
        img.alt = movie.title;
        img.className = 'mr-3 align-self-start';
        img.style.width = '60px';
        movieElement.appendChild(img);

        const mediaBody = document.createElement('div');
        mediaBody.className = 'media-body';

        // const movieLink = document.createElement('a');
        // movieLink.href = `/movies/${movie.id}`;
        // movieLink.innerText = movie.title;
        // movieLink.className = 'mt-0';
        // mediaBody.appendChild(movieLink);
        const movieLink = document.createElement('a');
        movieLink.href = `/movies/${movie.id}`;
        movieLink.innerText = movie.title;
        movieLink.className = 'mt-0 movie-title-link';  // Add class for styling
        mediaBody.appendChild(movieLink);

        const movieYear = document.createElement('h6');
        movieYear.innerText = movie.release_date.split('-')[0];
        mediaBody.appendChild(movieYear);

        // const movieOverview = document.createElement('p');
        // movieOverview.innerText = movie.overview;
        // mediaBody.appendChild(movieOverview);
        const movieOverview = document.createElement('p');
        movieOverview.innerText = movie.overview;
        movieOverview.className = 'movie-overview';  // Add class for styling
        mediaBody.appendChild(movieOverview);

        // Create the "See more" button
        const seeMoreButton = document.createElement('a');
        seeMoreButton.href = `/movies/${movie.id}`;
        seeMoreButton.innerText = 'See more';
        seeMoreButton.className = 'btn';
        seeMoreButton.style.backgroundColor = '#040012';
        seeMoreButton.style.color = 'white';
        mediaBody.appendChild(seeMoreButton);

        movieElement.appendChild(mediaBody);
        newSearchResultsContainer.appendChild(movieElement);
    }

    // Create pagination
    const pagination = document.createElement('ul');
    pagination.className = 'pagination justify-content-center mt-4';

    const maxPagesToShow = 5;  // Maximum number of pages to display at once
    const startPage = Math.max(1, currentPage - Math.floor(maxPagesToShow / 2));
    const endPage = Math.min(totalPages, startPage + maxPagesToShow - 1);

    // Add "First" page button
    pagination.appendChild(createPageLink(1, 'First', query, currentPage === 1));

    for (let i = startPage; i <= endPage; i++) {
        pagination.appendChild(createPageLink(i, i.toString(), query, i === currentPage));
    }

    // Add "Last" page button
    pagination.appendChild(createPageLink(totalPages, 'Last', query, currentPage === totalPages));

    newSearchResultsContainer.appendChild(pagination);

    // Append new search results container to the existing one
    searchResultsContainer.appendChild(newSearchResultsContainer);
}

function createPageLink(page, text, query, isActive = false) {
    const pageLink = document.createElement('li');
    pageLink.className = 'page-item';
    if (isActive) {
        pageLink.classList.add('active'); // Highlight current page
    }
    const link = document.createElement('a');
    link.className = 'page-link';
    link.href = '#';
    link.innerText = text;
    link.addEventListener('click', event => {
        event.preventDefault();
        performSearch(query, page);
    });
    pageLink.appendChild(link);

    return pageLink;
}
