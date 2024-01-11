function validateForm() {
    var newTagInput = document.getElementById('newTag');
    var tagError = document.getElementById('tagError');

    if (newTagInput.value.trim() === '') {
        tagError.classList.remove('hidden');
        return false;
    } else {
        tagError.classList.add('hidden');
        return true;
    }
}

function closeMessage(element) {
    element.style.display = 'none';
}