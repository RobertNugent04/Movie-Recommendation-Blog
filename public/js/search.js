document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.form-control');
    const searchButton = document.querySelector('.btn-outline-light');

    searchButton.addEventListener('click', event => {
        event.preventDefault();
        performSearch(searchInput.value);
    });

    searchInput.addEventListener('keyup', event => {
        if (event.key === 'Enter') {
            event.preventDefault();
            performSearch(searchInput.value);
        }
    });
});


async function performSearch(query) {
    const apiKey = '8295dbb4116ffc5b458cb9378ac368ea';
    const url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${encodeURIComponent(query)}`;
    // const url = `https://api.themoviedb.org/3/movie/550?api_key=8295dbb4116ffc5b458cb9378ac368ea&query=${encodeURIComponent(query)}`;

    const response = await fetch(url);
    const data = await response.json();
    console.log(data.results);  // Add this line


    displayResults(data.results);
}

// function displayResults(movies) {
//     // Clear previous search results
//     const searchResultsContainer = document.getElementById('search-results');
//     if (searchResultsContainer) {
//         searchResultsContainer.remove();
//     }

//     // Create a container for the search results
//     const newSearchResultsContainer = document.createElement('div');
//     newSearchResultsContainer.id = 'search-results';
//     newSearchResultsContainer.className = 'container mt-3';

//     // Iterate through movies and display them
//     for (const movie of movies) {
//         const movieElement = document.createElement('div');
//         movieElement.className = 'search-result';

//         const movieLink = document.createElement('a');
//         movieLink.href = `/movies/${movie.id}`;
//         movieLink.innerText = movie.title;

//         movieElement.appendChild(movieLink);
//         newSearchResultsContainer.appendChild(movieElement);
//     }

//     document.body.appendChild(newSearchResultsContainer);
// }

function displayResults(movies) {
    // Get the search results container
    const searchResultsContainer = document.getElementById('search-results-container');

    // Clear previous search results
    searchResultsContainer.innerHTML = '';

    // Create a container for the search results
    const newSearchResultsContainer = document.createElement('div');
    newSearchResultsContainer.id = 'search-results';
    newSearchResultsContainer.className = 'container mt-3';

    // Iterate through movies and display them
    for (const movie of movies) {
        const movieElement = document.createElement('div');
        movieElement.className = 'card mb-3';

        if (movie.poster_path) {
            const img = document.createElement('img');
            img.src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
            img.alt = movie.title;
            img.className = 'card-img-top';
            movieElement.appendChild(img);
        } else {
            // Optional: Add a default image or some placeholder content here
            const img = document.createElement('img');
            img.src = `https://www.nbmchealth.com/wp-content/uploads/2018/04/default-placeholder.png`;
            img.alt = movie.title;
            img.className = 'card-img-top';
            movieElement.appendChild(img);
        }

        const cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        const movieLink = document.createElement('a');
        movieLink.href = `/movies/${movie.id}`;
        movieLink.innerText = movie.title;
        movieLink.className = 'card-title';
        cardBody.appendChild(movieLink);

        const movieYear = document.createElement('p');
        movieYear.innerText = movie.release_date.split('-')[0];
        movieYear.className = 'card-subtitle mb-2 text-muted';
        cardBody.appendChild(movieYear);

        const movieOverview = document.createElement('p');
        movieOverview.innerText = movie.overview;
        movieOverview.className = 'card-text';
        cardBody.appendChild(movieOverview);

        movieElement.appendChild(cardBody);
        newSearchResultsContainer.appendChild(movieElement);
    }

    // Append new search results container to the existing one
    searchResultsContainer.appendChild(newSearchResultsContainer);
}
