
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const suggestionsContainer = document.getElementById('suggestions-container');

    let currentSuggestions = []; // To store the current suggestions

    // Function to fetch employee names based on search input
    function fetchEmployeeNames(searchText) {
        fetch(`conn.php?search=${searchText}`)
            .then(response => response.json())
            .then(data => {
                currentSuggestions = data.employeeNames; // Update the current suggestions
                showSuggestions(); // Call function to display the suggestions
            })
            .catch(error => {
                console.error('Error fetching employee names:', error);
            });
    }

    // Function to show the suggestions in the suggestions container
    function showSuggestions() {
        suggestionsContainer.innerHTML = ''; // Clear previous suggestions

        currentSuggestions.forEach(employeeName => {
            const suggestionElement = document.createElement('div');
            suggestionElement.textContent = employeeName;
            suggestionElement.classList.add('suggestion');
            suggestionElement.addEventListener('click', () => {
                // Call function to add the selected employee to the table
                addSelectedEmployee(employeeName);
            });
            suggestionsContainer.appendChild(suggestionElement);
        });
    }

    // Function to add the selected employee to the table
    function addSelectedEmployee(employeeName) {
        // Use AJAX to fetch employee ID and department based on the selected employee name
        fetch(`get_employee_details.php?name=${encodeURIComponent(employeeName)}`)
            .then(response => response.json())
            .then(data => {
                const employeeId = data.employeeId;
                const department = data.department;

                const employeeTable = document.getElementById('employee-table');

                const newRow = document.createElement('tr');
                newRow.classList.add('tr');
                newRow.innerHTML = `
                    <td><input type="checkbox" name="employee_ids[]" value="${employeeId}"></td>
                    <td><input type="hidden" name="emp_id[]" value="${employeeId}">${employeeId}</td>
                    <td><input type="hidden" name="emp_name[]" value="${employeeName}">${employeeName}</td>
                    <td><input type="hidden" name="emp_department[]" value="${department}">${department}</td>
                    <td><input type='text' name='project_id[]'></td>
                    <td><input type="text" class="tar" name="target[]"></td>
                    <td><input type="text" class="tar" name="completed[]"></td>
                    <td><input type="text" class="tar" name="pending[]" readonly></td>
                    <td><input type="text" class="tar" name="percentage[]"></td>
                `;

                employeeTable.querySelector('tbody').appendChild(newRow);

                // Clear the search input and suggestions after adding the employee
                searchInput.value = '';
                currentSuggestions = [];
                suggestionsContainer.innerHTML = '';
            })
            .catch(error => {
                console.error('Error fetching employee details:', error);
            });
    }

    // Event listener for search input keyup
    searchInput.addEventListener('keyup', e => {
        const searchText = e.target.value.trim();
        if (searchText !== '') {
            fetchEmployeeNames(searchText);
        } else {
            currentSuggestions = [];
            suggestionsContainer.innerHTML = ''; // Clear suggestions if search input is empty
        }
    });
});
