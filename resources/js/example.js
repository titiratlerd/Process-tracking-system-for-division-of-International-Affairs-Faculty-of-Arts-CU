document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('#myCheckbox');
    const dots = document.querySelectorAll('#myDiv');

    checkboxes.forEach(function(checkbox, index) {
        checkbox.addEventListener('change', function() {
            const targetDot = dots[index];

            if (targetDot) {
                targetDot.classList.toggle('bg-pink-400', this.checked);
                targetDot.classList.toggle('bg-gray-400', !this.checked);
            }
        });
    });
});


//change value in if the checkbox is checked


document.querySelectorAll('.custom-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        var id = this.id.replace('student_process', ''); // Get the number part of the checkbox ID
        var statusInput = document.getElementById('statusInput' + id);
        statusInput.value = this.checked ? '1' : '2'; // Set value to 1 if checked, 2 if unchecked
    });
});


