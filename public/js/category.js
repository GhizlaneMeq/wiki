function validateForm() {
    var newCategoryInput = document.getElementById('newCategory');
    var categoryError = document.getElementById('categoryError');

    if (newCategoryInput.value.trim() === '') {
        categoryError.classList.remove('hidden');
        return false;
    } else {
        categoryError.classList.add('hidden');
        return true;
    }
}



function closeMessage(element) {
    element.parentNode.style.display = 'none';
}



function confirmDelete(categoryId) {
    var confirmDelete = confirm("Are you sure you want to delete this category?");
    if (confirmDelete) {
        window.location.href = "delete-category?id=" + categoryId;
    }
}