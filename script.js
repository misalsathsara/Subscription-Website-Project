document.addEventListener('DOMContentLoaded', () => {
    const removeButtons = document.querySelectorAll('.remove-btn');
    const itemList = document.getElementById('item-list');
    const totalCost = document.querySelector('.total-cost h3');

    removeButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const itemId = e.target.dataset.item;
            // Logic to remove item from the package (e.g., send a request to the server)

            // Remove item from the DOM
            e.target.parentElement.remove();

            // Update total cost
            updateTotalCost();
        });
    });

    function updateTotalCost() {
        let total = 0;
        itemList.querySelectorAll('li').forEach(item => {
            const priceText = item.querySelector('span').textContent.split('- $')[1];
            total += parseFloat(priceText);
        });
        totalCost.textContent = `Total Cost: $${total.toFixed(2)}`;
    }
});

function navigateToDetails(packageType) {
    window.location.href = `package-details.html?package=${encodeURIComponent(packageType)}`;
}