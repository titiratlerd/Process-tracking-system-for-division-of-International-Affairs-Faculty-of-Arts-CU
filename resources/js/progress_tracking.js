// Get all expand buttons
const expandButtons = document.querySelectorAll('.expand-btn');

// Loop through each expand button and add event listener
expandButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Get the corresponding process-details element
        const processDetails = document.querySelector(`.process-details-${index + 1}`);
        
        // Toggle its visibility
        if (processDetails.style.display === 'none') {
            processDetails.style.display = 'block';
            button.textContent = '^'; // Change button text to 'collapse'
        } else {
            processDetails.style.display = 'none';
            button.textContent = 'v'; // Change button text to 'expand'
        }
    });
});

const expandNames = document.querySelectorAll('.expand-name');
// Loop through each expand name and add event listener
expandNames.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Get the corresponding process-details element
        const processDetails = document.querySelector(`.process-details-${index + 1}`);

        // Toggle its visibility
        if (processDetails.style.display === 'none') {
            processDetails.style.display = 'block';
        } else {
            processDetails.style.display = 'none';
        }
    });
});
