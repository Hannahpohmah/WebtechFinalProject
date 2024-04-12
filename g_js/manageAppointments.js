document.getElementById("createChoreForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var choreName = document.getElementById("choreName").value;
    var assignPerson = document.getElementById("assignPerson").value;
    var dueDate = document.getElementById("dueDate").value;
    var description = document.getElementById("description").value;

    var choreContainer = document.getElementById("choreContainer");

    var choreRow = document.createElement("tr");

    var nameCell = document.createElement("td");
    nameCell.textContent = assignPerson;
    choreRow.appendChild(nameCell);

    var choreCell = document.createElement("td");
    choreCell.textContent = choreName;
    choreRow.appendChild(choreCell);

    var statusCell = document.createElement("td");
    statusCell.textContent = "On Going";
    choreRow.appendChild(statusCell);

    var descriptionCell = document.createElement("td");
    descriptionCell.textContent = description;
    choreRow.appendChild(descriptionCell);

    choreContainer.appendChild(choreRow);

    // Optionally, you may want to clear the form fields after submission
    document.getElementById("choreName").value = "";
    document.getElementById("assignPerson").value = "";
    document.getElementById("dueDate").value = "";
    document.getElementById("description").value = "";
  });