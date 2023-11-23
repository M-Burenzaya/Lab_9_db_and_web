function addStudent() {
    const formData = new FormData(document.getElementById("studentForm"));

    fetch("student.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Network response was not ok.");
        })
        .then((data) => {
            window.alert("Data sent successfully: " + data);
        })
        .catch((error) => {
            window.alert("Error: " + error.message);
        });
}

function addLibraryVisit() {
    const formData = new FormData(document.getElementById("visitForm"));

    fetch("library.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Network response was not ok.");
        })
        .then((data) => {
            window.alert("Data sent successfully: " + data);
        })
        .catch((error) => {
            window.alert("Error: " + error.message);
        });
}

function showStudentHours() {
    const formData = new FormData(document.getElementById("hoursForm"));

    fetch("join_student_visit.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Network response was not ok.");
        })
        .then((data) => {
            document.querySelector(".result").innerHTML = data;
        })
        .catch((error) => {
            window.alert("Error: " + error.message);
        });
}
